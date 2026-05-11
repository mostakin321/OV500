<?php

namespace App\Filament\Resources\CustomerDialplans\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class CustomerDialplansTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('account_id')->label('Account Id')->sortable()->searchable(),
                TextColumn::make('dialplan_id')->label('Dialplan Id')->sortable()->searchable(),
                TextColumn::make('maching_string')->label('Maching String')->sortable()->searchable(),
                TextColumn::make('display_string')->label('Display String')->sortable()->searchable(),
                TextColumn::make('remove_string')->label('Remove String')->sortable()->searchable(),
                TextColumn::make('add_string')->label('Add String')->sortable()->searchable(),
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
