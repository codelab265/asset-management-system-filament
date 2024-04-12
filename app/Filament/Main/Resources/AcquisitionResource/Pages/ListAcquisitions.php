<?php

namespace App\Filament\Main\Resources\AcquisitionResource\Pages;

use App\Filament\Main\Resources\AcquisitionResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAcquisitions extends ListRecords
{
    protected static string $resource = AcquisitionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
