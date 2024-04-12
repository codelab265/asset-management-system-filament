<?php

namespace App\Filament\Main\Resources\DisposalResource\Pages;

use App\Filament\Main\Resources\DisposalResource;
use Filament\Resources\Pages\CreateRecord;

class CreateDisposal extends CreateRecord
{
    protected static string $resource = DisposalResource::class;

    protected function getHeaderActions(): array
    {
        return [

        ];
    }
}
