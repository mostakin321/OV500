<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;

class Routes extends Page
{
    protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-map';

    protected static string|\UnitEnum|null $navigationGroup = 'Routing Management';

    protected static ?string $navigationLabel = 'Routes';

    protected static ?int $navigationSort = 30;

    protected static ?string $slug = 'routes';

    protected static string $view = 'filament.pages.legacy-module-placeholder';
}
