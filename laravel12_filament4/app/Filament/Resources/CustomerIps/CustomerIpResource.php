<?php

namespace App\Filament\Resources\CustomerIps;

use App\Filament\Resources\CustomerIps\Pages;
use App\Filament\Resources\CustomerIps\Schemas\CustomerIpForm;
use App\Filament\Resources\CustomerIps\Tables\CustomerIpsTable;
use App\Models\CustomerIp;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;

class CustomerIpResource extends Resource
{
    protected static ?string $model = CustomerIp::class;

    protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-computer-desktop';

    protected static string|\UnitEnum|null $navigationGroup = 'Accounts';

    protected static ?string $recordTitleAttribute = 'ipaddress';

    public static function form(Schema $schema): Schema
    {
        return CustomerIpForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return CustomerIpsTable::configure($table);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCustomerIps::route('/'),
            'create' => Pages\CreateCustomerIp::route('/create'),
            'edit' => Pages\EditCustomerIp::route('/{record}/edit'),
        ];
    }
}
