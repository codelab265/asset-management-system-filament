<?php

namespace App\Filament\Main\Widgets;

use App\Models\Department;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class AssetsByDepartment extends BaseWidget
{
    protected static ?int $sort = 3;
    public function table(Table $table): Table
    {
        return $table
            ->query(
                Department::query()
            )
            ->columns([
                TextColumn::make('building')
                    ->description(fn ($record) => $record->floor . '-' . $record->room),
                TextColumn::make('assets_count')->counts('assets'),

            ]);
    }
}
