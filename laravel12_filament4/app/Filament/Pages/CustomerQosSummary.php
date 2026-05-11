<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;

class CustomerQosSummary extends Page
{
    protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-chart-bar';

    protected static string|\UnitEnum|null $navigationGroup = 'Live System Reports';

    protected static ?string $navigationLabel = 'Customer QoS Summary';

    protected static ?int $navigationSort = 20;

    protected static ?string $slug = 'customer-qos-summary';

    protected static string $view = 'filament.pages.legacy-module-placeholder';
}
