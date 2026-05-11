<?php

namespace App\Filament\Resources\Users\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class UsersTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('user_id')->label('User ID')->sortable()->searchable(),
                TextColumn::make('account_id')->label('Account ID')->sortable()->searchable(),
                TextColumn::make('username')->sortable()->searchable(),
                TextColumn::make('name')->sortable()->searchable(),
                TextColumn::make('emailaddress')->label('Email')->sortable()->searchable(),
                TextColumn::make('user_type')->label('User Type')->badge()->sortable(),
                TextColumn::make('customer.company_name')->label('Customer'),
                TextColumn::make('reseller.company_name')->label('Reseller'),
                TextColumn::make('balance.balance')->label('Balance / Used Credit')->numeric(decimalPlaces: 6),
                TextColumn::make('balance.credit_limit')->label('Credit Limit')->numeric(decimalPlaces: 6),
                TextColumn::make('balance.usable_balance')->label('Usable Balance')->numeric(decimalPlaces: 6),
                TextColumn::make('balance.credit_status')->label('Credit Status')->badge(),
                TextColumn::make('status_id')->label('Status')->badge()->sortable(),
            ])
            ->filters([
                SelectFilter::make('user_type')
                    ->label('User Type')
                    ->options([
                        'ADMIN' => 'Admin',
                        'RESELLERADMIN' => 'Reseller Admin',
                        'CUSTOMERADMIN' => 'Customer Admin',
                        'CUSTOMER' => 'Customer User',
                        'RESELLER' => 'Reseller User',
                    ]),
                SelectFilter::make('account_owner')
                    ->label('Account Owner')
                    ->options([
                        'customer' => 'Customer account',
                        'reseller' => 'Reseller account',
                        'system' => 'System/unassigned account',
                    ])
                    ->query(fn (Builder $query, array $data): Builder => $query
                        ->when($data['value'] ?? null, fn (Builder $query, string $owner): Builder => match ($owner) {
                            'customer' => $query->whereHas('customer'),
                            'reseller' => $query->whereHas('reseller'),
                            'system' => $query->whereDoesntHave('customer')->whereDoesntHave('reseller'),
                            default => $query,
                        })),
                SelectFilter::make('balance_status')
                    ->label('Balance Status')
                    ->options([
                        'missing' => 'Missing balance row',
                        'has_balance' => 'Has balance row',
                        'credit_exceeded' => 'Credit exceeded',
                    ])
                    ->query(fn (Builder $query, array $data): Builder => $query
                        ->when($data['value'] ?? null, fn (Builder $query, string $status): Builder => match ($status) {
                            'missing' => $query->whereDoesntHave('balance'),
                            'has_balance' => $query->whereHas('balance'),
                            'credit_exceeded' => $query->whereHas('balance', fn (Builder $balanceQuery): Builder => $balanceQuery
                                ->where('credit_limit', '>', 0)
                                ->whereColumn('balance', '>=', 'credit_limit')),
                            default => $query,
                        })),
                SelectFilter::make('status_id')->label('Status')->options([
                    1 => 'Active',
                    0 => 'Inactive',
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
