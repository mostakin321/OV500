<?php

namespace App\Filament\Resources\CustomerDialplans;

use App\Filament\Resources\CustomerDialplans\Pages;
use App\Filament\Resources\CustomerDialplans\Schemas\CustomerDialplanForm;
use App\Filament\Resources\CustomerDialplans\Tables\CustomerDialplansTable;
use App\Models\CustomerDialplan;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;

class CustomerDialplanResource extends Resource
{
    protected static ?string $model = CustomerDialplan::class;

    protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-arrow-path-rounded-square';

    protected static string|\UnitEnum|null $navigationGroup = 'Accounts';

    protected static ?string $recordTitleAttribute = 'account_id';

    public static function form(Schema $schema): Schema
    {
        return CustomerDialplanForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return CustomerDialplansTable::configure($table);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCustomerDialplans::route('/'),
            'create' => Pages\CreateCustomerDialplan::route('/create'),
            'edit' => Pages\EditCustomerDialplan::route('/{record}/edit'),
        ];
    }
}
