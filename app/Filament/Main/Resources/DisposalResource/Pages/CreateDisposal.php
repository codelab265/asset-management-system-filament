<?php

namespace App\Filament\Main\Resources\DisposalResource\Pages;

use App\Filament\Main\Resources\DisposalResource;
use App\Models\Asset;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;

class CreateDisposal extends CreateRecord
{
    protected static string $resource = DisposalResource::class;

    protected function getHeaderActions(): array
    {
        return [];
    }
}
