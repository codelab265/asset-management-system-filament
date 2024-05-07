<?php

namespace App\Filament\Main\Resources\SoftwareLicenceResource\Pages;

use App\Filament\Main\Resources\SoftwareLicenceResource;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;

class CreateSoftwareLicence extends CreateRecord
{
    protected static string $resource = SoftwareLicenceResource::class;

    protected function getHeaderActions(): array
    {
        return [];
    }
}
