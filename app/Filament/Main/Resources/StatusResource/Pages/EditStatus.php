<?php

namespace App\Filament\Main\Resources\StatusResource\Pages;

use App\Filament\Main\Resources\StatusResource;
use Filament\Resources\Pages\EditRecord;

class EditStatus extends EditRecord
{
    protected static string $resource = StatusResource::class;

    protected function getHeaderActions(): array
    {
        return [

        ];
    }
}
