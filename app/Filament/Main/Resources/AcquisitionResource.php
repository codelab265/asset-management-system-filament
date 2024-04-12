<?php

namespace App\Filament\Main\Resources;

use App\Filament\Main\Resources\AcquisitionResource\Pages;
use App\Models\Acquisition;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class AcquisitionResource extends Resource
{
    protected static ?string $model = Acquisition::class;
    protected static ?string $navigationGroup = "Assets";
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('category_id')->nullable()->relationship('category', 'name'),
                Forms\Components\Select::make('department_id')->nullable()->relationship('department', 'name'),
                Forms\Components\Select::make('personnel_id')->nullable()->relationship('personnel', 'name'),
                Forms\Components\Select::make('status_id')->nullable()->relationship('status', 'name'),
                Forms\Components\TextInput::make('tag_number'),
                Forms\Components\TextInput::make('model_number'),
                Forms\Components\TextInput::make('serial_number'),
                Forms\Components\DatePicker::make('purchase_date'),
                Forms\Components\TextInput::make('purchase_price')->numeric(),
                Forms\Components\TextInput::make('warrant')->numeric(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('tag_number')->searchable(),
                Tables\Columns\TextColumn::make('model_number')->searchable(),
                Tables\Columns\TextColumn::make('serial_number')->searchable(),

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
            'index' => Pages\ListAcquisitions::route('/'),
            'create' => Pages\CreateAcquisition::route('/create'),
            'edit' => Pages\EditAcquisition::route('/{record}/edit'),
        ];
    }
}
