<?php

namespace App\Filament\Resources\PaymentHistories\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class PaymentHistoriesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('payment_id')->label('Payment Id')->sortable()->searchable(),
                TextColumn::make('account_id')->label('Account Id')->sortable()->searchable(),
                TextColumn::make('amount')->label('Amount')->sortable()->searchable(),
                TextColumn::make('paid_on')->label('Paid On')->sortable()->searchable(),
                TextColumn::make('transaction_id')->label('Transaction Id')->sortable()->searchable(),
                TextColumn::make('created_by')->label('Created By')->sortable()->searchable(),
            ])
            ->filters([
                // Searchable columns above cover the OV500 listing filters for this module.
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
