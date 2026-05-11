<?php

namespace App\Filament\Resources\Providers\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ProvidersTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('provider_id')->label('Provider Id')->sortable()->searchable(),
                TextColumn::make('provider_name')->label('Provider Name')->sortable()->searchable(),
                TextColumn::make('currency_id')->label('Currency Id')->sortable()->searchable(),
                TextColumn::make('provider_emailid')->label('Provider Emailid')->sortable()->searchable(),
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
