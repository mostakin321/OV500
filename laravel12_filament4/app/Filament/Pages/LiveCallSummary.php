<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;

class LiveCallSummary extends Page
{
    protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-phone-arrow-up-right';

    protected static string|\UnitEnum|null $navigationGroup = 'Live System Reports';

    protected static ?string $navigationLabel = 'Live Call Summary';

    protected static ?int $navigationSort = 10;

    protected static ?string $slug = 'live-call-summary';

    protected static string $view = 'filament.pages.legacy-module-placeholder';
}
