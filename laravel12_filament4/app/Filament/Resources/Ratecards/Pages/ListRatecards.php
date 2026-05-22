<?php

namespace App\Filament\Resources\Ratecards\Pages;

use App\Filament\Resources\Ratecards\RatecardResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListRatecards extends ListRecords
{
    protected static string $resource = RatecardResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
