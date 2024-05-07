<?php

namespace App\Filament\Main\Resources\MovementResource\Pages;

use App\Filament\Main\Resources\MovementResource;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Database\Eloquent\Model;

class EditMovement extends EditRecord
{
    protected static string $resource = MovementResource::class;

    protected function getHeaderActions(): array
    {
        return [];
    }

    protected function handleRecordUpdate(Model $record, array $data): Model
    {

        $record->update($data);
        $record->asset()->update([
            'department_id' => $data['current_department_id'],
            'personnel_id' => $data['current_personnel_id'],
        ]);

        return $record;
    }
}
