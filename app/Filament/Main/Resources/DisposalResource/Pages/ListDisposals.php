<?php

namespace App\Filament\Main\Resources\DisposalResource\Pages;

use App\Filament\Main\Resources\DisposalResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListDisposals extends ListRecords
{
    protected static string $resource = DisposalResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
