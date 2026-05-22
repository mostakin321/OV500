<?php

namespace App\Filament\Resources\TariffRatecardMaps\Pages;

use App\Filament\Resources\TariffRatecardMaps\TariffRatecardMapResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListTariffRatecardMaps extends ListRecords
{
    protected static string $resource = TariffRatecardMapResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
