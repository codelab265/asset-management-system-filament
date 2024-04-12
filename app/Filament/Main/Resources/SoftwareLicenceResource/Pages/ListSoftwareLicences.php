<?php

namespace App\Filament\Main\Resources\SoftwareLicenceResource\Pages;

use App\Filament\Main\Resources\SoftwareLicenceResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSoftwareLicences extends ListRecords
{
    protected static string $resource = SoftwareLicenceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
