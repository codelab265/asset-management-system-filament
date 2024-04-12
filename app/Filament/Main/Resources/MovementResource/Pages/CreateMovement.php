<?php

namespace App\Filament\Main\Resources\MovementResource\Pages;

use App\Filament\Main\Resources\MovementResource;
use Filament\Resources\Pages\CreateRecord;

class CreateMovement extends CreateRecord
{
    protected static string $resource = MovementResource::class;

    protected function getHeaderActions(): array
    {
        return [

        ];
    }
}
