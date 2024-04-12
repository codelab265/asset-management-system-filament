<?php

namespace App\Filament\Main\Resources;

use App\Filament\Main\Resources\MaintenanceHistoryResource\Pages;
use App\Models\MaintenanceHistory;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class MaintenanceHistoryResource extends Resource
{
    protected static ?string $model = MaintenanceHistory::class;

    protected static ?string $navigationGroup = "Assets";

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('asset_id')->nullable()->relationship('asset', 'name'),
                Forms\Components\TextInput::make('maintenance_performed'),
                Forms\Components\TextInput::make('maintenance_date'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('maintenance_performed')->searchable(),
                Tables\Columns\TextColumn::make('maintenance_date')->searchable(),
            ])
            ->filters([])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListMaintenanceHistories::route('/'),
            'create' => Pages\CreateMaintenanceHistory::route('/create'),
            'edit' => Pages\EditMaintenanceHistory::route('/{record}/edit'),
        ];
    }
}
