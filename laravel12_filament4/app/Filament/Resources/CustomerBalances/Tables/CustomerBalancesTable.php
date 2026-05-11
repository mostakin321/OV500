<?php

namespace App\Filament\Resources\CustomerBalances\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class CustomerBalancesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('account_id')->label('Account ID')->searchable()->sortable(),
                TextColumn::make('customer.company_name')->label('Customer')->searchable()->sortable(),
                TextColumn::make('customer.billing_type')->label('Billing Type')->badge()->sortable(),
                TextColumn::make('balance')->numeric(decimalPlaces: 6)->sortable(),
                TextColumn::make('credit_limit')->numeric(decimalPlaces: 6)->sortable(),
                TextColumn::make('maxcredit_limit')->label('Max Credit')->numeric(decimalPlaces: 6)->sortable(),
                TextColumn::make('service_type')->badge()->sortable(),
                TextColumn::make('update_dt')->label('Last Updated')->dateTime()->sortable(),
            ])
            ->filters([
                SelectFilter::make('billing_type')
                    ->label('Billing Type')
                    ->options([
                        'prepaid' => 'Prepaid',
                        'postpaid' => 'Postpaid',
                        'netoff' => 'Net-off',
                    ])
                    ->query(fn (Builder $query, array $data): Builder => $query
                        ->when($data['value'] ?? null, fn (Builder $query, string $billingType): Builder => $query
                            ->whereHas('customer', fn (Builder $customerQuery): Builder => $customerQuery
                                ->where('billing_type', $billingType)))),
                SelectFilter::make('service_type')->options([
                    'SWITCH' => 'SWITCH',
                    'PBX' => 'PBX',
                ]),
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
