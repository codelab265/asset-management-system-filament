<?php

namespace App\Filament\Main\Resources;

use App\Filament\Main\Resources\SoftwareLicenceResource\Pages;
use App\Models\SoftwareLicence;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class SoftwareLicenceResource extends Resource
{
    protected static ?string $model = SoftwareLicence::class;

    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document-check';
    protected static ?int $navigationSort = 4;
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('asset_id')->nullable()->relationship('asset', 'name'),
                Forms\Components\TextInput::make('edition'),
                Forms\Components\TextInput::make('version'),
                Forms\Components\DatePicker::make('installed_on'),
                Forms\Components\TextInput::make('os_build'),
                Forms\Components\TextInput::make('experience'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('edition')->searchable(),
                Tables\Columns\TextColumn::make('version')->searchable(),
                Tables\Columns\TextColumn::make('os_build')->searchable(),
                Tables\Columns\TextColumn::make('experience')->searchable(),
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
            'index' => Pages\ListSoftwareLicences::route('/'),
            'create' => Pages\CreateSoftwareLicence::route('/create'),
            'edit' => Pages\EditSoftwareLicence::route('/{record}/edit'),
        ];
    }
}
