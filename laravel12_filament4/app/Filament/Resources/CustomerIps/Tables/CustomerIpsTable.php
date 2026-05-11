<?php

namespace App\Filament\Resources\CustomerIps\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class CustomerIpsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('account_id')->label('Account Id')->sortable()->searchable(),
                TextColumn::make('ipaddress')->label('Ipaddress')->sortable()->searchable(),
                TextColumn::make('dialprefix')->label('Dialprefix')->sortable()->searchable(),
                TextColumn::make('ip_cc')->label('Ip Cc')->sortable()->searchable(),
                TextColumn::make('ip_cps')->label('Ip Cps')->sortable()->searchable(),
                TextColumn::make('ip_status')->label('Ip Status')->sortable()->searchable(),
                TextColumn::make('ipauthfrom')->label('Ipauthfrom')->sortable()->searchable(),
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
