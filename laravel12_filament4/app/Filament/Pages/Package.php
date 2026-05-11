<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;

class Package extends Page
{
    protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-square-3-stack-3d';

    protected static string|\UnitEnum|null $navigationGroup = 'Rates & Package';

    protected static ?string $navigationLabel = 'Package';

    protected static ?int $navigationSort = 40;

    protected static ?string $slug = 'package';

    protected static string $view = 'filament.pages.legacy-module-placeholder';
}
