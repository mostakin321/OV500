<?php

namespace App\Filament\Resources\Providers\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class ProviderForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('provider_id')->label('Provider Code')->maxLength(255),
                TextInput::make('provider_name')->label('Provider Name')->maxLength(255)->required(),
                TextInput::make('currency_id')->label('Currency Id')->numeric(),
                Textarea::make('provider_address')->label('Address')->columnSpanFull(),
                TextInput::make('provider_emailid')->label('Email')->email()->maxLength(100)->columnSpanFull(),
                TextInput::make('account_id')->label('Account Id')->maxLength(255),
            ]);
    }
}
