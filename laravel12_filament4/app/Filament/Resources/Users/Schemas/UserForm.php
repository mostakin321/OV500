<?php

namespace App\Filament\Resources\Users\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class UserForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Legacy user')
                    ->schema([
                        TextInput::make('user_id')->label('User ID')->required()->maxLength(30),
                        TextInput::make('account_id')->label('Account ID')->required()->maxLength(30),
                        Select::make('user_type')->label('User Type')->options([
                            'ADMIN' => 'Admin',
                            'RESELLERADMIN' => 'Reseller Admin',
                            'CUSTOMERADMIN' => 'Customer Admin',
                            'CUSTOMER' => 'Customer User',
                            'RESELLER' => 'Reseller User',
                        ])->required(),
                        TextInput::make('username')->required()->maxLength(30),
                        TextInput::make('secret')->password()->revealable()->maxLength(30),
                        TextInput::make('name')->required()->maxLength(100),
                        TextInput::make('emailaddress')->email()->required()->maxLength(100),
                        TextInput::make('phone')->maxLength(50),
                        TextInput::make('address')->maxLength(256),
                        TextInput::make('country_id')->numeric(),
                        Select::make('status_id')->label('Status')->options([
                            1 => 'Active',
                            0 => 'Inactive',
                        ])->default(1),
                    ])
                    ->columns(2),
                Section::make('Audit')
                    ->schema([
                        DateTimePicker::make('create_dt')->label('Created At'),
                        TextInput::make('create_by')->label('Created By')->maxLength(30),
                        DateTimePicker::make('update_dt')->label('Updated At'),
                        TextInput::make('update_by')->label('Updated By')->maxLength(30),
                    ])
                    ->columns(2),
            ]);
    }
}
