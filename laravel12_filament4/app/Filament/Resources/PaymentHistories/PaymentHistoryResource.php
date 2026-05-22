<?php

namespace App\Filament\Resources\PaymentHistories;

use App\Filament\Resources\PaymentHistories\Pages;
use App\Filament\Resources\PaymentHistories\Schemas\PaymentHistoryForm;
use App\Filament\Resources\PaymentHistories\Tables\PaymentHistoriesTable;
use App\Models\PaymentHistory;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;

class PaymentHistoryResource extends Resource
{
    protected static ?string $model = PaymentHistory::class;

    protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-banknotes';

    protected static string|\UnitEnum|null $navigationGroup = 'Accounts';

    protected static ?string $recordTitleAttribute = 'account_id';

    public static function form(Schema $schema): Schema
    {
        return PaymentHistoryForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return PaymentHistoriesTable::configure($table);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPaymentHistories::route('/'),
            'create' => Pages\CreatePaymentHistory::route('/create'),
            'edit' => Pages\EditPaymentHistory::route('/{record}/edit'),
        ];
    }
}
