<?php

namespace App\Filament\Main\Resources\MaintenanceHistoryResource\Pages;

use App\Filament\Main\Resources\MaintenanceHistoryResource;
use Filament\Resources\Pages\EditRecord;

class EditMaintenanceHistory extends EditRecord
{
    protected static string $resource = MaintenanceHistoryResource::class;

    protected function getHeaderActions(): array
    {
        return [

        ];
    }
}
