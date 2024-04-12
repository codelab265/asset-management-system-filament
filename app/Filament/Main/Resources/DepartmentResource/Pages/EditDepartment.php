<?php

namespace App\Filament\Main\Resources\DepartmentResource\Pages;

use App\Filament\Main\Resources\DepartmentResource;
use Filament\Resources\Pages\EditRecord;

class EditDepartment extends EditRecord
{
    protected static string $resource = DepartmentResource::class;

    protected function getHeaderActions(): array
    {
        return [

        ];
    }
}
