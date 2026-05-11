<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;

class Vendor extends Page
{
    protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-building-storefront';

    protected static string|\UnitEnum|null $navigationGroup = 'Routing Management';

    protected static ?string $navigationLabel = 'Vendor';

    protected static ?int $navigationSort = 10;

    protected static ?string $slug = 'vendor';

    protected static string $view = 'filament.pages.legacy-module-placeholder';
}
