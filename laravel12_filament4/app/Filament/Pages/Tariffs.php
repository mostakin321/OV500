<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;

class Tariffs extends Page
{
    protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-currency-dollar';

    protected static string|\UnitEnum|null $navigationGroup = 'Rates & Package';

    protected static ?string $navigationLabel = 'Tariffs';

    protected static ?int $navigationSort = 30;

    protected static ?string $slug = 'tariffs';

    protected static string $view = 'filament.pages.legacy-module-placeholder';
}
