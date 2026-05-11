<?php

namespace App\Filament\Resources\Customers\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class CustomersTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('customer_id')->label('Customer Id')->sortable()->searchable(),
                TextColumn::make('account_id')->label('Account Id')->sortable()->searchable(),
                TextColumn::make('company_name')->label('Company Name')->sortable()->searchable(),
                TextColumn::make('contact_name')->label('Contact Name')->sortable()->searchable(),
                TextColumn::make('name')->label('Name')->sortable()->searchable(),
                TextColumn::make('phone')->label('Phone')->sortable()->searchable(),
                TextColumn::make('emailaddress')->label('Emailaddress')->sortable()->searchable(),
                TextColumn::make('billing_type')->label('Billing Type')->badge()->sortable()->searchable(),
                TextColumn::make('balance.balance')->label('Balance / Used Credit')->numeric(decimalPlaces: 6),
                TextColumn::make('balance.credit_limit')->label('Credit Limit')->numeric(decimalPlaces: 6),
                TextColumn::make('balance.usable_balance')->label('Usable Balance')->numeric(decimalPlaces: 6),
                TextColumn::make('balance.credit_status')->label('Credit Status')->badge(),
            ])
            ->filters([
                SelectFilter::make('billing_type')
                    ->label('Billing Type')
                    ->options([
                        'prepaid' => 'Prepaid',
                        'postpaid' => 'Postpaid',
                        'netoff' => 'Net-off',
                    ]),
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
