<?php

namespace App\Filament\Main\Resources;

use App\Filament\Main\Resources\MovementResource\Pages;
use App\Models\Movement;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class MovementResource extends Resource
{
    protected static ?string $model = Movement::class;

    protected static ?string $navigationGroup = "Assets";

    protected static ?string $navigationIcon = 'heroicon-o-arrows-right-left';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('asset_id')->nullable()->required()->label('Asset')->relationship('asset', 'name'),
                Forms\Components\Select::make('previous_department_id')->nullable()->required()->label('previous_department')->options([]),
                Forms\Components\Select::make('previous_personnel_id')->nullable()->options([]),
                Forms\Components\Select::make('current_department_id')->nullable()->required()->label('Current_department')->options([]),
                Forms\Components\Select::make('current_personnel_id')->nullable()->required()->label('Current_personnel')->options([]),
                Forms\Components\DatePicker::make('moved_date'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([])
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
            'index' => Pages\ListMovements::route('/'),
            'create' => Pages\CreateMovement::route('/create'),
            'edit' => Pages\EditMovement::route('/{record}/edit'),
        ];
    }
}
