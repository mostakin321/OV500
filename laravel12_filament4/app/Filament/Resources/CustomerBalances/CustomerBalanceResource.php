<?php

namespace App\Filament\Resources\CustomerBalances;

use App\Filament\Resources\CustomerBalances\Pages;
use App\Filament\Resources\CustomerBalances\Schemas\CustomerBalanceForm;
use App\Filament\Resources\CustomerBalances\Tables\CustomerBalancesTable;
use App\Models\CustomerBalance;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;

class CustomerBalanceResource extends Resource
{
    protected static ?string $model = CustomerBalance::class;

    protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-wallet';

    protected static string|\UnitEnum|null $navigationGroup = 'Billing';

    protected static ?string $navigationLabel = 'Account Balances';

    protected static ?string $modelLabel = 'Account Balance';

    protected static ?string $pluralModelLabel = 'Account Balances';

    protected static ?string $recordTitleAttribute = 'account_id';

    public static function form(Schema $schema): Schema
    {
        return CustomerBalanceForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return CustomerBalancesTable::configure($table);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCustomerBalances::route('/'),
            'create' => Pages\CreateCustomerBalance::route('/create'),
            'edit' => Pages\EditCustomerBalance::route('/{record}/edit'),
        ];
    }
}
