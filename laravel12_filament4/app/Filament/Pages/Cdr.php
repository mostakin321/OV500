<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;

class Cdr extends Page
{
    protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-document-text';

    protected static string|\UnitEnum|null $navigationGroup = 'Call Detail Reports';

    protected static ?string $navigationLabel = 'CDR';

    protected static ?int $navigationSort = 10;

    protected static ?string $slug = 'cdr';

    protected static string $view = 'filament.pages.legacy-module-placeholder';
}
