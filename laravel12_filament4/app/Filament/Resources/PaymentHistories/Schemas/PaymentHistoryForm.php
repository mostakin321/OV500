<?php

namespace App\Filament\Resources\PaymentHistories\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class PaymentHistoryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('account_id')->label('Account Code')->maxLength(255)->required(),
                TextInput::make('payment_option_id')->label('Payment Option')->maxLength(255)->required(),
                TextInput::make('payment_collection_id')->label('Collection Id')->maxLength(255),
                TextInput::make('amount')->label('Amount')->numeric(),
                DateTimePicker::make('paid_on')->label('Paid On')->maxLength(255)->required(),
                TextInput::make('transaction_id')->label('Transaction Id')->maxLength(255)->required(),
                Textarea::make('notes')->label('Notes')->columnSpanFull(),
                TextInput::make('file_name')->label('File Name')->maxLength(255),
                Textarea::make('other_data')->label('Other Data')->columnSpanFull(),
                Textarea::make('invoice_data')->label('Invoice Data')->columnSpanFull(),
                TextInput::make('created_by')->label('Created By')->maxLength(255)->required(),
                DateTimePicker::make('create_dt')->label('Created Dt')->maxLength(255)->required(),
            ]);
    }
}
