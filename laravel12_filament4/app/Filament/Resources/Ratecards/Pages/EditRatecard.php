<?php

namespace App\Filament\Resources\Ratecards\Pages;

use App\Filament\Resources\Ratecards\RatecardResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditRatecard extends EditRecord
{
    protected static string $resource = RatecardResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
