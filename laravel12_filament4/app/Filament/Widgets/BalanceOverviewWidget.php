<?php

namespace App\Filament\Widgets;

use App\Models\Customer;
use App\Models\CustomerBalance;
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

        $activeLiveCalls = \App\Models\LiveCall::query()
            ->whereNotIn('callstatus', ['END', 'ENDED', 'HANGUP'])
            ->count();

        return [
            Stat::make('Prepaid Customers', $prepaidAccountIds->count())
                ->description('Balance: '.number_format((float) $prepaidBalance, 6)),
            Stat::make('Postpaid Customers', $postpaidAccountIds->count())
                ->description('Balance: '.number_format((float) $postpaidBalance, 6)),
            Stat::make('Postpaid Credit Limit', number_format((float) $postpaidCreditLimit, 6))
                ->description('Configured credit exposure ceiling'),
            Stat::make('Live CDR / Active Calls', $activeLiveCalls)
                ->description('Calls currently visible in livecalls'),
        ];
    }
}
