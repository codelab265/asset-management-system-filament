<?php

namespace App\Filament\Main\Resources\AssetResource\Pages;

use App\Filament\Main\Resources\AssetResource;
use Filament\Resources\Pages\CreateRecord;

class CreateAsset extends CreateRecord
{
    protected static string $resource = AssetResource::class;

    protected function getHeaderActions(): array
    {
        return [

        ];
    }
}
