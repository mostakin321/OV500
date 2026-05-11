<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;

class DialPlans extends Page
{
    protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-list-bullet';

    protected static string|\UnitEnum|null $navigationGroup = 'Routing Management';

    protected static ?string $navigationLabel = 'Dial Plans';

    protected static ?int $navigationSort = 40;

    protected static ?string $slug = 'dial-plans';

    protected static string $view = 'filament.pages.legacy-module-placeholder';
}
