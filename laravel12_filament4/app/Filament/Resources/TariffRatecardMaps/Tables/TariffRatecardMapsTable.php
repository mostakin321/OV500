<?php

namespace App\Filament\Resources\TariffRatecardMaps\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class TariffRatecardMapsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('tariff_id')->label('Tariff Id')->sortable()->searchable(),
                TextColumn::make('ratecard_id')->label('Ratecard Id')->sortable()->searchable(),
                TextColumn::make('ratecard_for')->label('Ratecard For')->sortable()->searchable(),
                TextColumn::make('priority')->label('Priority')->sortable()->searchable(),
                TextColumn::make('start_day')->label('Start Day')->sortable()->searchable(),
                TextColumn::make('start_time')->label('Start Time')->sortable()->searchable(),
                TextColumn::make('end_day')->label('End Day')->sortable()->searchable(),
                TextColumn::make('end_time')->label('End Time')->sortable()->searchable(),
                TextColumn::make('status')->label('Status')->sortable()->searchable(),
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
