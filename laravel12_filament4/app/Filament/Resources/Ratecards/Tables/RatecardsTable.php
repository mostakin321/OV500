<?php

namespace App\Filament\Resources\Ratecards\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class RatecardsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('ratecard_id')->label('Ratecard Id')->sortable()->searchable(),
                TextColumn::make('ratecard_name')->label('Ratecard Name')->sortable()->searchable(),
                TextColumn::make('ratecard_type')->label('Ratecard Type')->sortable()->searchable(),
                TextColumn::make('ratecard_currency_id')->label('Ratecard Currency Id')->sortable()->searchable(),
                TextColumn::make('ratecard_for')->label('Ratecard For')->sortable()->searchable(),
                TextColumn::make('account_id')->label('Account Id')->sortable()->searchable(),
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
