<?php

namespace App\Filament\Resources\CarrierRates\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class CarrierRatesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('rate_id')->label('Rate Id')->sortable()->searchable(),
                TextColumn::make('ratecard_id')->label('Ratecard Name')->sortable()->searchable(),
                TextColumn::make('prefix')->label('Rate Prefix')->sortable()->searchable(),
                TextColumn::make('destination')->label('Destination')->sortable()->searchable(),
                TextColumn::make('rate')->label('Rate per Minute')->sortable()->searchable(),
                TextColumn::make('connection_charge')->label('Charge / Connection')->sortable()->searchable(),
                TextColumn::make('minimal_time')->label('First Pulse')->sortable(),
                TextColumn::make('resolution_time')->label('Billing Slab')->sortable(),
                TextColumn::make('rates_status')->label('Status')->sortable()->searchable(),
            ])
            ->filters([
                // Search supports tariff/ratecard, prefix, destination, and status columns.
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
