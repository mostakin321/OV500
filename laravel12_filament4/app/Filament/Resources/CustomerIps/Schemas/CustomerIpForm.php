<?php

namespace App\Filament\Resources\CustomerIps\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class CustomerIpForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('account_id')->label('Account Code')->maxLength(255)->required(),
                TextInput::make('ipaddress')->label('IP Address')->maxLength(255)->required(),
                Textarea::make('description')->label('Description')->columnSpanFull(),
                TextInput::make('dialprefix')->label('Dial Prefix')->maxLength(255),
                TextInput::make('ip_cc')->label('Maximum Call Sessions')->numeric(),
                TextInput::make('ip_cps')->label('Call Sessions Per Second')->numeric(),
                Select::make('ipauthfrom')->label('IP Auth From')->options(['SRC' => 'SRC', 'FROM' => 'FROM', 'NO' => 'NO']),
                TextInput::make('billingcode')->label('Billing Code')->maxLength(255),
                Select::make('ip_status')->label('Status')->options(['1' => 'Active', '0' => 'Inactive']),
            ]);
    }
}
