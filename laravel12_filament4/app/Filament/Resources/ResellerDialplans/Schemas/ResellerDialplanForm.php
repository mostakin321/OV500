<?php

namespace App\Filament\Resources\ResellerDialplans\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class ResellerDialplanForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('account_id')->label('Account Code')->maxLength(255)->required(),
                TextInput::make('dialplan_id')->label('Routes')->maxLength(255)->required(),
                DateTimePicker::make('create_dt')->label('Created Dt')->maxLength(255),
            ]);
    }
}
