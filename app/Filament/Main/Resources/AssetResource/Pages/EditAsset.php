<?php

namespace App\Filament\Main\Resources\AssetResource\Pages;

use App\Filament\Main\Resources\AssetResource;
use Filament\Resources\Pages\EditRecord;

class EditAsset extends EditRecord
{
    protected static string $resource = AssetResource::class;

    protected function getHeaderActions(): array
    {
        return [

        ];
    }
}
