<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;

class PaymentLog extends Page
{
    protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-banknotes';

    protected static string|\UnitEnum|null $navigationGroup = 'Business Report';

    protected static ?string $navigationLabel = 'Payment Log';

    protected static ?int $navigationSort = 60;

    protected static ?string $slug = 'payment-log';

    protected static string $view = 'filament.pages.legacy-module-placeholder';
}
