<?php

namespace App\Filament\Resources\ResellerDialplans;

use App\Filament\Resources\ResellerDialplans\Pages;
use App\Filament\Resources\ResellerDialplans\Schemas\ResellerDialplanForm;
use App\Filament\Resources\ResellerDialplans\Tables\ResellerDialplansTable;
use App\Models\ResellerDialplan;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;

class ResellerDialplanResource extends Resource
{
    protected static ?string $model = ResellerDialplan::class;

    protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-share';

    protected static string|\UnitEnum|null $navigationGroup = 'Accounts';

    protected static ?string $recordTitleAttribute = 'account_id';

    public static function form(Schema $schema): Schema
    {
        return ResellerDialplanForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ResellerDialplansTable::configure($table);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListResellerDialplans::route('/'),
            'create' => Pages\CreateResellerDialplan::route('/create'),
            'edit' => Pages\EditResellerDialplan::route('/{record}/edit'),
        ];
    }
}
