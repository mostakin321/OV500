<?php

namespace App\Filament\Resources\CustomerSipAccounts\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class CustomerSipAccountForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('account_id')->label('Account Code')->required()->maxLength(30),
                TextInput::make('username')->label('SIP Device Login')->required()->maxLength(30),
                TextInput::make('secret')->label('SIP Device Secret')->password()->maxLength(30),
                TextInput::make('extension_no')->label('Extension No')->numeric(),
                Select::make('voicemail_enabled')->label('Voice Mail')->options(['Y' => 'Active', 'N' => 'Inactive']),
                TextInput::make('email_address')->label('Email Address For Voice Mail')->email()->maxLength(150)->columnSpanFull(),
                TextInput::make('ipaddress')->label('IP Address')->maxLength(30),
                TextInput::make('sip_cc')->label('Maximum Call Sessions')->numeric(),
                TextInput::make('sip_cps')->label('Call Session Per Second')->numeric(),
                Select::make('status')->label('Status')->options(['1' => 'Active', '0' => 'Inactive'])->required(),
                Select::make('ipauthfrom')->label('IP Auth From')->options(['FROM' => 'FROM', 'SRC' => 'SRC', 'NO' => 'NO']),
                TextInput::make('display_name')->label('Display Name')->maxLength(30),
                TextInput::make('caller_id')->label('Caller ID')->maxLength(150),
                TextInput::make('codecs')->label('Codec List')->maxLength(50),
                TextInput::make('name')->label('Name')->maxLength(100),
                TextInput::make('phone_number')->label('Phone Number')->maxLength(20),
                Select::make('call_recording')->label('Call Recording')->options(['1' => 'Active', '0' => 'Inactive']),
                Select::make('dnd')->label('Do Not Disturb')->options(['Y' => 'Yes', 'N' => 'No']),
            ]);
    }
}
