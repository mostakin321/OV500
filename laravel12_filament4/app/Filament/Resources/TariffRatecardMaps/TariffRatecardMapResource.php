<?php

namespace App\Filament\Resources\TariffRatecardMaps;

use App\Filament\Resources\TariffRatecardMaps\Pages;
use App\Filament\Resources\TariffRatecardMaps\Schemas\TariffRatecardMapForm;
use App\Filament\Resources\TariffRatecardMaps\Tables\TariffRatecardMapsTable;
use App\Models\TariffRatecardMap;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;

class TariffRatecardMapResource extends Resource
{
    protected static ?string $model = TariffRatecardMap::class;

    protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-link';

    protected static string|\UnitEnum|null $navigationGroup = 'Rating';

    protected static ?string $recordTitleAttribute = 'tariff_id';

    public static function form(Schema $schema): Schema
    {
        return TariffRatecardMapForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return TariffRatecardMapsTable::configure($table);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTariffRatecardMaps::route('/'),
            'create' => Pages\CreateTariffRatecardMap::route('/create'),
            'edit' => Pages\EditTariffRatecardMap::route('/{record}/edit'),
        ];
    }
}
