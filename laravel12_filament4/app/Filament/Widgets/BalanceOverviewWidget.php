<?php

namespace App\Filament\Widgets;

use App\Models\Customer;
use App\Models\CustomerBalance;
use App\Models\LiveCall;
use App\Models\Reseller;
use App\Models\User;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class BalanceOverviewWidget extends StatsOverviewWidget
{
    protected static ?string $pollingInterval = '30s';

    protected function getStats(): array
    {
        $prepaidAccountIds = Customer::query()
            ->where('billing_type', 'prepaid')
            ->pluck('account_id');

        $postpaidAccountIds = Customer::query()
            ->where('billing_type', 'postpaid')
            ->pluck('account_id');

        $prepaidBalance = CustomerBalance::query()
            ->whereIn('account_id', $prepaidAccountIds)
            ->sum('balance');

        $postpaidBalance = CustomerBalance::query()
            ->whereIn('account_id', $postpaidAccountIds)
            ->sum('balance');

        $postpaidCreditLimit = CustomerBalance::query()
            ->whereIn('account_id', $postpaidAccountIds)
            ->sum('credit_limit');

        $resellerAccountIds = Reseller::query()->pluck('account_id');

        $userAccountIds = User::query()
            ->whereNotIn('account_id', $prepaidAccountIds->merge($postpaidAccountIds)->merge($resellerAccountIds)->filter()->unique())
            ->pluck('account_id')
            ->filter()
            ->unique();

        $resellerBalance = CustomerBalance::query()
            ->whereIn('account_id', $resellerAccountIds)
            ->sum('balance');

        $userOnlyBalance = CustomerBalance::query()
            ->whereIn('account_id', $userAccountIds)
            ->sum('balance');

        $liveCdrTotal = LiveCall::query()->count();

        $liveCdrAnswered = LiveCall::query()
            ->whereNotNull('answer_time')
            ->count();

        $liveCdrAsr = $liveCdrTotal > 0
            ? ($liveCdrAnswered / $liveCdrTotal) * 100
            : 0;

        $liveCdrAcd = LiveCall::query()
            ->whereNotNull('answer_time')
            ->selectRaw('AVG(TIMESTAMPDIFF(SECOND, answer_time, COALESCE(end_time, NOW()))) as acd_seconds')
            ->value('acd_seconds') ?? 0;

        $activeLiveCalls = LiveCall::query()
            ->whereNotIn('callstatus', ['END', 'ENDED', 'HANGUP'])
            ->count();

        return [
            Stat::make('Prepaid Customers', $prepaidAccountIds->count())
                ->description('Balance: '.number_format((float) $prepaidBalance, 6)),
            Stat::make('Postpaid Customers', $postpaidAccountIds->count())
                ->description('Balance: '.number_format((float) $postpaidBalance, 6)),
            Stat::make('Postpaid Credit Limit', number_format((float) $postpaidCreditLimit, 6))
                ->description('Configured credit exposure ceiling'),
            Stat::make('Reseller Balances', $resellerAccountIds->count())
                ->description('Balance: '.number_format((float) $resellerBalance, 6)),
            Stat::make('User-only Balances', $userAccountIds->count())
                ->description('Balance: '.number_format((float) $userOnlyBalance, 6)),
            Stat::make('Live CDR / Active Calls', $activeLiveCalls)
                ->description('Calls currently visible in livecalls'),
            Stat::make('Live CDR ASR', number_format($liveCdrAsr, 2).'%')
                ->description($liveCdrAnswered.' answered / '.$liveCdrTotal.' attempts'),
            Stat::make('Live CDR ACD', gmdate('H:i:s', (int) round((float) $liveCdrAcd)))
                ->description(number_format((float) $liveCdrAcd, 2).' average answered seconds'),
        ];
    }
}
