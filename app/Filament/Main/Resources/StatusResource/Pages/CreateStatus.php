<?php

namespace App\Filament\Main\Resources\StatusResource\Pages;

use App\Filament\Main\Resources\StatusResource;
use Filament\Resources\Pages\CreateRecord;

class CreateStatus extends CreateRecord
{
    protected static string $resource = StatusResource::class;

    protected function getHeaderActions(): array
    {
        return [

        ];
    }
}
