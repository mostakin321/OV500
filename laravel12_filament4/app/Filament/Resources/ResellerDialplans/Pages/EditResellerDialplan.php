<?php

namespace App\Filament\Resources\ResellerDialplans\Pages;

use App\Filament\Resources\ResellerDialplans\ResellerDialplanResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditResellerDialplan extends EditRecord
{
    protected static string $resource = ResellerDialplanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
