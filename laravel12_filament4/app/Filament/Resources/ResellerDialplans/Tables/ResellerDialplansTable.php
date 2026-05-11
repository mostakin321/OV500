<?php

namespace App\Filament\Resources\ResellerDialplans\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ResellerDialplansTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('account_id')->label('Account Id')->sortable()->searchable(),
                TextColumn::make('dialplan_id')->label('Dialplan Id')->sortable()->searchable(),
                TextColumn::make('create_dt')->label('Create Dt')->sortable()->searchable(),
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
