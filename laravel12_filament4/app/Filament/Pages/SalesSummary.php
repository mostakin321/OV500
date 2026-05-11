<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;

class SalesSummary extends Page
{
    protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-presentation-chart-bar';

    protected static string|\UnitEnum|null $navigationGroup = 'Business Report';

    protected static ?string $navigationLabel = 'Sales Summary';

    protected static ?int $navigationSort = 40;

    protected static ?string $slug = 'sales-summary';

    protected static string $view = 'filament.pages.legacy-module-placeholder';
}
