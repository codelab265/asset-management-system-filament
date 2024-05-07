<?php

namespace App\Filament\Main\Resources\MovementResource\Pages;

use App\Filament\Main\Resources\MovementResource;
use App\Models\Asset;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;

class CreateMovement extends CreateRecord
{
    protected static string $resource = MovementResource::class;

    protected function getHeaderActions(): array
    {
        return [];
    }

    protected function handleRecordCreation(array $data): Model
    {
        Asset::find($data['asset_id'])->update([
            'department_id' => $data['current_department_id'],
            'personnel_id' => $data['current_personnel_id'],
        ]);
        return static::getModel()::create($data);
    }
}
