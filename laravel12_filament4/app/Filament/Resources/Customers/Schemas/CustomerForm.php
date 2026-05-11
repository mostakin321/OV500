<?php

namespace App\Filament\Resources\Customers\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class CustomerForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('account_id')->label('Account ID')->required()->maxLength(50),
                TextInput::make('company_name')->label('Company')->required()->maxLength(50),
                TextInput::make('contact_name')->label('Web Access / Contact Name')->maxLength(150),
                TextInput::make('name')->label('Name')->required()->maxLength(30),
                Select::make('billing_type')->label('Billing Type')->options(['prepaid' => 'Prepaid', 'postpaid' => 'Postpaid', 'netoff' => 'Net Off'])->required(),
                Select::make('billing_cycle')->label('Billing Cycle')->options(['weekly' => 'Weekly', 'monthly' => 'Monthly'])->required(),
                TextInput::make('payment_terms')->label('Payment Term From Invoice Date')->numeric()->required(),
                DatePicker::make('next_billing_date')->label('Next Billing Date'),
                TextInput::make('country_id')->label('Country')->numeric(),
                TextInput::make('state_code_id')->label('State / Code')->numeric(),
                TextInput::make('phone')->label('Phone Number')->tel()->maxLength(30),
                TextInput::make('emailaddress')->label('Email Address')->email()->maxLength(1000)->columnSpanFull(),
                Textarea::make('address')->label('Address')->columnSpanFull(),
                TextInput::make('pincode')->label('PIN')->maxLength(15),
                Select::make('view_ipdevices')->label('Customer IP Devices')->options(['1' => 'Enabled', '0' => 'Disabled']),
                Select::make('view_sipdevice')->label('Customer SIP User Devices')->options(['1' => 'Enabled', '0' => 'Disabled']),
                Select::make('view_src_out')->label('Source Number Translation Rules')->options(['1' => 'Enabled', '0' => 'Disabled']),
                Select::make('view_dst_out')->label('Destination Number Translation Rules')->options(['1' => 'Enabled', '0' => 'Disabled']),
                Select::make('view_src_did')->label('DID Source Number Translation Rules')->options(['1' => 'Enabled', '0' => 'Disabled']),
                Select::make('view_dst_did')->label('DID Destination Number Translation Rules')->options(['1' => 'Enabled', '0' => 'Disabled']),
                DateTimePicker::make('created_dt')->label('Created Dt'),
                DateTimePicker::make('updated_dt')->label('Updated Dt'),
            ]);
    }
}
