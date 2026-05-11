<?php

namespace App\Filament\Widgets;

use App\Models\CustomerBalance;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget;
use Illuminate\Database\Eloquent\Builder;

class PrepaidBalanceRiskWidget extends TableWidget
{
    protected static ?string $heading = 'Prepaid Balance Watchlist';

    protected int|string|array $columnSpan = 'full';

    protected static ?string $pollingInterval = '30s';

    public function table(Table $table): Table
    {
        return $table
            ->query($this->getPrepaidBalanceQuery())
            ->columns([
                TextColumn::make('account_id')->label('Account')->searchable()->sortable(),
                TextColumn::make('customer.company_name')->label('Customer')->searchable()->sortable(),
                TextColumn::make('balance')->numeric(decimalPlaces: 6)->sortable(),
                TextColumn::make('credit_limit')->label('Credit Limit')->numeric(decimalPlaces: 6)->sortable(),
                TextColumn::make('service_type')->label('Service')->badge()->sortable(),
                TextColumn::make('update_dt')->label('Last Updated')->dateTime()->sortable(),
            ])
            ->defaultSort('balance')
            ->paginated([5, 10, 25]);
    }

    protected function getPrepaidBalanceQuery(): Builder
    {
        return CustomerBalance::query()
            ->whereHas('customer', fn (Builder $query) => $query->where('billing_type', 'prepaid'))
            ->where('balance', '<=', 0);
    }
}
