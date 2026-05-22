<?php

namespace App\Filament\Resources\CustomerDialplans\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class CustomerDialplanForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('account_id')->label('Account Code')->maxLength(255)->required(),
                TextInput::make('dialplan_id')->label('Routes')->maxLength(255)->required(),
                TextInput::make('maching_string')->label('Dialing Pattern')->maxLength(255)->required(),
                TextInput::make('display_string')->label('Display / Translation Rule')->maxLength(255),
                TextInput::make('remove_string')->label('Remove String')->maxLength(255),
                TextInput::make('add_string')->label('Add String')->maxLength(255),
            ]);
    }
}
