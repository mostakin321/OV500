<?php

namespace App\Filament\Resources\CustomerDialplans\Pages;

use App\Filament\Resources\CustomerDialplans\CustomerDialplanResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListCustomerDialplans extends ListRecords
{
    protected static string $resource = CustomerDialplanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
