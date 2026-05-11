<?php

namespace App\Filament\Resources\Ratecards;

use App\Filament\Resources\Ratecards\Pages;
use App\Filament\Resources\Ratecards\Schemas\RatecardForm;
use App\Filament\Resources\Ratecards\Tables\RatecardsTable;
use App\Models\Ratecard;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;

class RatecardResource extends Resource
{
    protected static ?string $model = Ratecard::class;

    protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static string|\UnitEnum|null $navigationGroup = 'Rating';

    protected static ?string $recordTitleAttribute = 'ratecard_name';

    public static function form(Schema $schema): Schema
    {
        return RatecardForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return RatecardsTable::configure($table);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListRatecards::route('/'),
            'create' => Pages\CreateRatecard::route('/create'),
            'edit' => Pages\EditRatecard::route('/{record}/edit'),
        ];
    }
}
