<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;

class SalesDetail extends Page
{
    protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-receipt-percent';

    protected static string|\UnitEnum|null $navigationGroup = 'Business Report';

    protected static ?string $navigationLabel = 'Sales Detail';

    protected static ?int $navigationSort = 30;

    protected static ?string $slug = 'sales-detail';

    protected static string $view = 'filament.pages.legacy-module-placeholder';
}
