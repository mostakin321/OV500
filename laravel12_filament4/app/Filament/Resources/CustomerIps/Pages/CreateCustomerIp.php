<?php

namespace App\Filament\Resources\CustomerIps\Pages;

use App\Filament\Resources\CustomerIps\CustomerIpResource;
use Filament\Resources\Pages\CreateRecord;

class CreateCustomerIp extends CreateRecord
{
    protected static string $resource = CustomerIpResource::class;
}
