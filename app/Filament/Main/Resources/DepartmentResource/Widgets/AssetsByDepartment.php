<?php

namespace App\Filament\Main\Resources\DepartmentResource\Widgets;

use App\Models\Department;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class AssetsByDepartment extends BaseWidget
{
    public function table(Table $table): Table
    {
        return $table
            ->query(
                Department::query()
            )
            ->columns([
                TextColumn::make('building')
                    ->description(fn ($record) => $record->floor . '/' . $record->room),
                TextColumn::make('assets_count')->counts('assets'),

            ]);
    }
}
