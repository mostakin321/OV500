<?php

namespace App\Filament\Resources\CustomerBalances\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class CustomerBalanceForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('account_id')->label('Account ID')->required()->maxLength(30),
                TextInput::make('balance')->numeric()->label('Balance')->required(),
                TextInput::make('credit_limit')->numeric()->label('Credit Limit')->required(),
                TextInput::make('maxcredit_limit')->numeric()->label('Maximum Credit Limit'),
                Select::make('service_type')->label('Service Type')->options([
                    'SWITCH' => 'SWITCH',
                    'PBX' => 'PBX',
                ])->default('SWITCH'),
                DateTimePicker::make('update_dt')->label('Last Updated'),
            ]);
    }
}
