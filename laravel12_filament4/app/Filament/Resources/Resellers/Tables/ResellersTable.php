<?php

namespace App\Filament\Resources\Resellers\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class ResellersTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')->label('Id')->sortable()->searchable(),
                TextColumn::make('account_id')->label('Account Id')->sortable()->searchable(),
                TextColumn::make('company_name')->label('Company Name')->sortable()->searchable(),
                TextColumn::make('contact_name')->label('Contact Name')->sortable()->searchable(),
                TextColumn::make('phone')->label('Phone')->sortable()->searchable(),
                TextColumn::make('emailaddress')->label('Emailaddress')->sortable()->searchable(),
                TextColumn::make('pincode')->label('Pincode')->sortable()->searchable(),
                TextColumn::make('balance.balance')->label('Balance / Used Credit')->numeric(decimalPlaces: 6),
                TextColumn::make('balance.credit_limit')->label('Credit Limit')->numeric(decimalPlaces: 6),
                TextColumn::make('balance.usable_balance')->label('Usable Balance')->numeric(decimalPlaces: 6),
                TextColumn::make('balance.credit_status')->label('Credit Status')->badge(),
            ])
            ->filters([
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
