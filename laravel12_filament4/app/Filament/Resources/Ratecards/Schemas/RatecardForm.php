<?php

namespace App\Filament\Resources\Ratecards\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class RatecardForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('ratecard_id')->label('Ratecard Code')->maxLength(255)->required(),
                TextInput::make('ratecard_name')->label('Ratecard Name')->maxLength(255)->required(),
                Select::make('ratecard_type')->label('Who Can Use')->options(['CUSTOMER' => 'Customer', 'CARRIER' => 'Carrier']),
                TextInput::make('ratecard_currency_id')->label('Currency Id')->numeric(),
                Select::make('ratecard_for')->label('Usage For')->options(['INCOMING' => 'DID incoming calls', 'OUTGOING' => 'Outgoing calls']),
                TextInput::make('account_id')->label('Account Id')->maxLength(255)->required(),
                DateTimePicker::make('created_dt')->label('Created Dt')->maxLength(255),
                DateTimePicker::make('updated_dt')->label('Updated Dt')->maxLength(255),
            ]);
    }
}
