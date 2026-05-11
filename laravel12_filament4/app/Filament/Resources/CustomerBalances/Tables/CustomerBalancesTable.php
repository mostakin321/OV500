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
                TextColumn::make('account_type')->label('Account Type')->badge(),
                TextColumn::make('account_name')->label('Account Name'),
                TextColumn::make('customer.billing_type')->label('Billing Type')->badge()->sortable(),
                TextColumn::make('balance')->label('Balance / Used Credit')->numeric(decimalPlaces: 6)->sortable(),
                TextColumn::make('credit_limit')->numeric(decimalPlaces: 6)->sortable(),
                TextColumn::make('usable_balance')->label('Usable Balance')->numeric(decimalPlaces: 6),
                TextColumn::make('credit_utilization_percent')->label('Credit Used %')->numeric(decimalPlaces: 2)->suffix('%'),
                TextColumn::make('maxcredit_limit')->label('Max Credit')->numeric(decimalPlaces: 6)->sortable(),
                TextColumn::make('credit_status')->label('Status')->badge(),
                TextColumn::make('service_type')->badge()->sortable(),
                TextColumn::make('update_dt')->label('Last Updated')->dateTime()->sortable(),
            ])
            ->filters([
                SelectFilter::make('account_type')
                    ->label('Account Type')
                    ->options([
                        'customer' => 'Customer',
                        'reseller' => 'Reseller',
                        'user' => 'User only',
                        'unassigned' => 'Unassigned',
                    ])
                    ->query(fn (Builder $query, array $data): Builder => $query
                        ->when($data['value'] ?? null, function (Builder $query, string $accountType): Builder {
                            return match ($accountType) {
                                'customer' => $query->whereHas('customer'),
                                'reseller' => $query->whereHas('reseller'),
                                'user' => $query->whereDoesntHave('customer')->whereDoesntHave('reseller')->whereHas('users'),
                                'unassigned' => $query->whereDoesntHave('customer')->whereDoesntHave('reseller')->whereDoesntHave('users'),
                                default => $query,
                            };
                        })),
                SelectFilter::make('billing_type')
                    ->label('Customer Billing Type')
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
                SelectFilter::make('credit_status')
                    ->label('Credit Status')
                    ->options([
                        'available' => 'Available / prepaid credit remains',
                        'in_use' => 'In use',
                        'credit_exceeded' => 'Credit exceeded',
                    ])
                    ->query(fn (Builder $query, array $data): Builder => $query
                        ->when($data['value'] ?? null, fn (Builder $query, string $status): Builder => match ($status) {
                            'available' => $query->where('balance', '<=', 0),
                            'in_use' => $query->where('balance', '>', 0)->whereColumn('balance', '<', 'credit_limit'),
                            'credit_exceeded' => $query->where('credit_limit', '>', 0)->whereColumn('balance', '>=', 'credit_limit'),
                            default => $query,
                        })),
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
