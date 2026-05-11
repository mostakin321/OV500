<?php

namespace App\Filament\Resources\CustomerIps\Pages;

use App\Filament\Resources\CustomerIps\CustomerIpResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditCustomerIp extends EditRecord
{
    protected static string $resource = CustomerIpResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
