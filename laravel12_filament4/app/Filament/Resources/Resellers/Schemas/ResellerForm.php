<?php

namespace App\Filament\Resources\Resellers\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class ResellerForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('account_id')->label('Account Code')->required()->maxLength(30),
                TextInput::make('company_name')->label('Company')->required()->maxLength(50),
                TextInput::make('contact_name')->label('Name / Web Access Contact')->required()->maxLength(50),
                TextInput::make('country_id')->label('Country')->numeric(),
                TextInput::make('state_code_id')->label('State / Code')->numeric(),
                TextInput::make('phone')->label('Phone Number')->tel()->maxLength(30),
                TextInput::make('emailaddress')->label('Email Address')->email()->maxLength(1000)->columnSpanFull(),
                Textarea::make('address')->label('Address')->columnSpanFull(),
                TextInput::make('pincode')->label('PIN')->maxLength(15),
            ]);
    }
}
