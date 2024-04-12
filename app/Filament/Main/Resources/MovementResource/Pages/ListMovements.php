<?php

namespace App\Filament\Main\Resources\MovementResource\Pages;

use App\Filament\Main\Resources\MovementResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMovements extends ListRecords
{
    protected static string $resource = MovementResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
