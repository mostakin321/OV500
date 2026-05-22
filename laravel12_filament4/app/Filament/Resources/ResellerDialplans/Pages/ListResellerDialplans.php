<?php

namespace App\Filament\Resources\ResellerDialplans\Pages;

use App\Filament\Resources\ResellerDialplans\ResellerDialplanResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListResellerDialplans extends ListRecords
{
    protected static string $resource = ResellerDialplanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
