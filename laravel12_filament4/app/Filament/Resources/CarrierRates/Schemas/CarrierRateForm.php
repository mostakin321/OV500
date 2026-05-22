<?php

namespace App\Filament\Resources\CarrierRates\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class CarrierRateForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('ratecard_id')->label('Ratecard Name')->required()->maxLength(30),
                TextInput::make('prefix')->label('Prefix')->required()->maxLength(25),
                TextInput::make('destination')->label('Destination')->required()->maxLength(150),
                TextInput::make('rate')->label('Rate per Minute')->numeric()->required(),
                TextInput::make('connection_charge')->label('Charge / Connection')->numeric()->required(),
                TextInput::make('minimal_time')->label('First Pulse')->numeric()->required(),
                TextInput::make('resolution_time')->label('After First Pulse Billing Slab')->numeric()->required(),
                TextInput::make('grace_period')->label('Grace Period')->numeric()->required(),
                TextInput::make('rate_multiplier')->label('Rate Multiplier')->numeric()->required(),
                TextInput::make('rate_addition')->label('Fix Charge Per Call')->numeric(),
                TextInput::make('setup_charge')->label('Setup Charge')->numeric(),
                TextInput::make('rental')->label('Rental')->numeric(),
                Select::make('rates_status')->label('Status')->options(['1' => 'Active', '0' => 'Inactive'])->required(),
                TextInput::make('account_id')->label('Account Id')->maxLength(30),
                DateTimePicker::make('create_dt')->label('Created Dt'),
                DateTimePicker::make('update_dt')->label('Updated Dt'),
            ]);
    }
}
