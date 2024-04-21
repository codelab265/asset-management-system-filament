<?php

namespace App\Filament\Main\Widgets;

use App\Models\Category;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class AssetsByCategory extends BaseWidget
{

    protected static ?int $sort = 2;
    public function table(Table $table): Table
    {
        return $table
            ->query(
                Category::query()
            )
            ->columns([
                TextColumn::make('name'),
                TextColumn::make('assets_count')->counts('assets'),

            ]);
    }
}
