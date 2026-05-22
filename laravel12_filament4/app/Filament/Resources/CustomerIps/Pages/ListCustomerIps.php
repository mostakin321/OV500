<?php

namespace App\Filament\Resources\CustomerIps\Pages;

use App\Filament\Resources\CustomerIps\CustomerIpResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListCustomerIps extends ListRecords
{
    protected static string $resource = CustomerIpResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
