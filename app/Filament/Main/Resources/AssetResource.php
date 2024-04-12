<?php

namespace App\Filament\Main\Resources;

use App\Filament\Main\Resources\AssetResource\Pages;
use App\Models\Asset;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class AssetResource extends Resource
{
    protected static ?string $model = Asset::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = "Assets";
    protected static ?string $navigationLabel = "Active Assets";


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('category_id')->nullable()->relationship('category', 'name'),
                Forms\Components\Select::make('department_id')->nullable()->relationship('department', 'building'),
                Forms\Components\Select::make('personnel_id')->nullable()->relationship('personnel', 'name'),
                Forms\Components\Select::make('status_id')->nullable()->required()->label('Status')->relationship('status', 'name'),
                Forms\Components\TextInput::make('tag_number'),
                Forms\Components\TextInput::make('model_number'),
                Forms\Components\TextInput::make('serial_number'),
                Forms\Components\TextInput::make('purchase_price')->numeric(),
                Forms\Components\DateTimePicker::make('purchase_date'),
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
            'index' => Pages\ListAssets::route('/'),
            'create' => Pages\CreateAsset::route('/create'),
            'edit' => Pages\EditAsset::route('/{record}/edit'),
        ];
    }
}
