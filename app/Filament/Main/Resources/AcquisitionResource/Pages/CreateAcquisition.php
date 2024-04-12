<?php

namespace App\Filament\Main\Resources\AcquisitionResource\Pages;

use App\Filament\Main\Resources\AcquisitionResource;
use Filament\Resources\Pages\CreateRecord;

class CreateAcquisition extends CreateRecord
{
    protected static string $resource = AcquisitionResource::class;

    protected function getHeaderActions(): array
    {
        return [

        ];
    }
}
