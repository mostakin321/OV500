<?php

namespace App\Filament\Resources\TariffRatecardMaps\Pages;

use App\Filament\Resources\TariffRatecardMaps\TariffRatecardMapResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditTariffRatecardMap extends EditRecord
{
    protected static string $resource = TariffRatecardMapResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
