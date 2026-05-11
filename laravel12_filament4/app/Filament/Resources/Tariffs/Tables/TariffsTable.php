<?php

namespace App\Filament\Resources\Tariffs\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class TariffsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('tariff_id')->label('Tariff Id')->sortable()->searchable(),
                TextColumn::make('tariff_name')->label('Tariff Name')->sortable()->searchable(),
                TextColumn::make('tariff_type')->label('Tariff Type')->sortable()->searchable(),
                TextColumn::make('tariff_currency_id')->label('Tariff Currency Id')->sortable()->searchable(),
                TextColumn::make('tariff_status')->label('Tariff Status')->sortable()->searchable(),
                TextColumn::make('package_option')->label('Package Option')->sortable()->searchable(),
                TextColumn::make('bundle_option')->label('Bundle Option')->sortable()->searchable(),
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
