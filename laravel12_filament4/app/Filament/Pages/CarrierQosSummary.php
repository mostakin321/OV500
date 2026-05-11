<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;

class CarrierQosSummary extends Page
{
    protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-presentation-chart-line';

    protected static string|\UnitEnum|null $navigationGroup = 'Live System Reports';

    protected static ?string $navigationLabel = 'Carrier QoS Summary';

    protected static ?int $navigationSort = 30;

    protected static ?string $slug = 'carrier-qos-summary';

    protected static string $view = 'filament.pages.legacy-module-placeholder';
}
