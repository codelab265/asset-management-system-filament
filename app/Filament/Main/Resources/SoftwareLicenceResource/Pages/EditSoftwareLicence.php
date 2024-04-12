<?php

namespace App\Filament\Main\Resources\SoftwareLicenceResource\Pages;

use App\Filament\Main\Resources\SoftwareLicenceResource;
use Filament\Resources\Pages\EditRecord;

class EditSoftwareLicence extends EditRecord
{
    protected static string $resource = SoftwareLicenceResource::class;

    protected function getHeaderActions(): array
    {
        return [

        ];
    }
}
