<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;

class TrafficProfitLoss extends Page
{
    protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-chart-pie';

    protected static string|\UnitEnum|null $navigationGroup = 'Business Report';

    protected static ?string $navigationLabel = 'Traffic Profit & Loss';

    protected static ?int $navigationSort = 10;

    protected static ?string $slug = 'traffic-profit-loss';

    protected static string $view = 'filament.pages.legacy-module-placeholder';
}
