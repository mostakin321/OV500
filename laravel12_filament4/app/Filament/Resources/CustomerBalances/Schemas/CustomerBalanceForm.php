<?php

namespace App\Filament\Resources\CustomerBalances\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class CustomerBalanceForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Account balance')
                    ->description('Manage the shared legacy customer_balance row used by customer, reseller, and user accounts.')
                    ->schema([
                        TextInput::make('account_id')
                            ->label('Account ID')
                            ->helperText('Use the customer, reseller, or user account_id from the legacy switch database.')
                            ->required()
                            ->maxLength(30),
                        Select::make('service_type')
                            ->label('Service Type')
                            ->options([
                                'SWITCH' => 'SWITCH',
                                'PBX' => 'PBX',
                            ])
                            ->default('SWITCH'),
                        TextInput::make('balance')
                            ->numeric()
                            ->label('Current Balance / Used Credit')
                            ->required(),
                        TextInput::make('credit_limit')
                            ->numeric()
                            ->label('Credit Limit')
                            ->required(),
                        TextInput::make('maxcredit_limit')
                            ->numeric()
                            ->label('Maximum Credit Limit'),
                        DateTimePicker::make('update_dt')->label('Last Updated'),
                    ])
                    ->columns(2),
            ]);
    }
}
