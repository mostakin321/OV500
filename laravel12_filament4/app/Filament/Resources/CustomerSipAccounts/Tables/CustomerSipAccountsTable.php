<?php

namespace App\Filament\Resources\CustomerSipAccounts\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class CustomerSipAccountsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')->label('Id')->sortable()->searchable(),
                TextColumn::make('account_id')->label('Account Code')->sortable()->searchable(),
                TextColumn::make('username')->label('SIP Device Login')->sortable()->searchable(),
                TextColumn::make('extension_no')->label('Extension No')->sortable()->searchable(),
                TextColumn::make('ipaddress')->label('IP Address')->sortable()->searchable(),
                TextColumn::make('sip_cc')->label('Max Sessions')->sortable(),
                TextColumn::make('sip_cps')->label('Sessions / Sec')->sortable(),
                TextColumn::make('status')->label('Status')->sortable()->searchable(),
            ])
            ->filters([
                // Searchable columns cover account, SIP login, IP address, and status.
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
