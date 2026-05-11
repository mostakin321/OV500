<?php

namespace App\Filament\Resources\TariffRatecardMaps\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class TariffRatecardMapForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('tariff_id')->label('Tariff')->maxLength(255)->required(),
                TextInput::make('ratecard_id')->label('Ratecard')->maxLength(255)->required(),
                TextInput::make('priority')->label('Priority')->numeric(),
                Select::make('ratecard_for')->label('Usage For')->options(['INCOMING' => 'DID incoming calls', 'OUTGOING' => 'Outgoing calls']),
                TextInput::make('start_day')->label('Start Day')->numeric(),
                TextInput::make('start_time')->label('Start Time')->maxLength(255)->required(),
                TextInput::make('end_day')->label('End Day')->numeric(),
                TextInput::make('end_time')->label('End Time')->maxLength(255)->required(),
                Select::make('status')->label('Status')->options(['1' => 'Active', '0' => 'Inactive']),
                TextInput::make('account_id')->label('Account Id')->maxLength(255),
            ]);
    }
}
