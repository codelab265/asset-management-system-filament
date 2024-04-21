<?php

namespace App\Filament\Main\Resources;

use App\Filament\Main\Resources\DisposalResource\Pages;
use App\Models\Disposal;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Support\Colors\Color;
use Filament\Tables;
use Filament\Tables\Table;

class DisposalResource extends Resource
{
    protected static ?string $model = Disposal::class;

    protected static ?int $navigationSort = 7;

    protected static ?string $navigationIcon = 'heroicon-o-archive-box-x-mark';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('asset_id')->nullable()->required()->label('Asset')->relationship('asset', 'name'),
                Forms\Components\TextInput::make('reason')->required()->label('Reason'),
                Forms\Components\DatePicker::make('disposed_date')->required()->label('Disposed_date'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('reason')->searchable(),

            ])
            ->filters([])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }
    public static function getNavigationBadgeColor(): ?array
    {
        return Color::Pink;
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListDisposals::route('/'),
            'create' => Pages\CreateDisposal::route('/create'),
            'edit' => Pages\EditDisposal::route('/{record}/edit'),
        ];
    }
}
