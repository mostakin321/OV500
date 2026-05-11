<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;

class VendorReport extends Page
{
    protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-clipboard-document-list';

    protected static string|\UnitEnum|null $navigationGroup = 'Business Report';

    protected static ?string $navigationLabel = 'vendor Report';

    protected static ?int $navigationSort = 50;

    protected static ?string $slug = 'vendor-report';

    protected static string $view = 'filament.pages.legacy-module-placeholder';
}
