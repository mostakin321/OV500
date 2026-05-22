<?php

namespace App\Filament\Resources\Tariffs\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class TariffForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('tariff_id')->label('Tariff Code')->maxLength(255)->required(),
                TextInput::make('tariff_name')->label('Name')->maxLength(255)->required(),
                Select::make('tariff_type')->label('Type')->options(['CUSTOMER' => 'Customer', 'CARRIER' => 'Carrier']),
                TextInput::make('tariff_currency_id')->label('Currency Id')->numeric(),
                Textarea::make('tariff_description')->label('Description')->columnSpanFull(),
                Select::make('tariff_status')->label('Status')->options(['1' => 'Active', '0' => 'Inactive']),
                TextInput::make('account_id')->label('Account Id')->maxLength(255)->required(),
                Select::make('package_option')->label('Package Services')->options(['1' => 'Yes', '0' => 'No']),
                TextInput::make('monthly_charges')->label('Monthly Tariff Charge')->numeric(),
                Select::make('bundle_option')->label('Has Bundle')->options(['1' => 'Yes', '0' => 'No']),
                Select::make('bundle1_type')->label('Bundle 1 Type')->options(['MINUTE' => 'Fixed Minute', 'COST' => 'Fixed Cost']),
                TextInput::make('bundle1_value')->label('Bundle 1 Value')->numeric(),
                Select::make('bundle2_type')->label('Bundle 2 Type')->options(['MINUTE' => 'Fixed Minute', 'COST' => 'Fixed Cost']),
                TextInput::make('bundle2_value')->label('Bundle 2 Value')->numeric(),
                Select::make('bundle3_type')->label('Bundle 3 Type')->options(['MINUTE' => 'Fixed Minute', 'COST' => 'Fixed Cost']),
                TextInput::make('bundle3_value')->label('Bundle 3 Value')->numeric(),
            ]);
    }
}
