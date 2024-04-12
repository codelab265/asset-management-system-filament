<?php

namespace App\Filament\Main\Resources\PersonnelResource\Pages;

use App\Filament\Main\Resources\PersonnelResource;
use Filament\Resources\Pages\CreateRecord;

class CreatePersonnel extends CreateRecord
{
    protected static string $resource = PersonnelResource::class;

    protected function getHeaderActions(): array
    {
        return [

        ];
    }
}
