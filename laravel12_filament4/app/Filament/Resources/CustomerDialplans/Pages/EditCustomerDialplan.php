<?php

namespace App\Filament\Resources\CustomerDialplans\Pages;

use App\Filament\Resources\CustomerDialplans\CustomerDialplanResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditCustomerDialplan extends EditRecord
{
    protected static string $resource = CustomerDialplanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
