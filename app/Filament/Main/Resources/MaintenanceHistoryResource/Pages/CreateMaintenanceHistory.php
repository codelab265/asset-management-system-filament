<?php

namespace App\Filament\Main\Resources\MaintenanceHistoryResource\Pages;

use App\Filament\Main\Resources\MaintenanceHistoryResource;
use Filament\Resources\Pages\CreateRecord;

class CreateMaintenanceHistory extends CreateRecord
{
    protected static string $resource = MaintenanceHistoryResource::class;

    protected function getHeaderActions(): array
    {
        return [

        ];
    }
}
