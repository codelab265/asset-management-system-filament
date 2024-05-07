<?php

namespace App\Filament\Main\Resources;

use App\Filament\Main\Resources\AcquisitionResource\Pages;
use App\Models\Acquisition;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Support\Colors\Color;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Model;

class AcquisitionResource extends Resource
{
    protected static ?string $model = Acquisition::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-plus';
    protected static ?int $navigationSort = 6;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('category_id')
                    ->relationship('category', 'name')
                    ->required(),
                Forms\Components\Select::make('department_id')
                    ->relationship('department', 'building')
                    ->getOptionLabelFromRecordUsing(fn (Model $record) => "{$record->building}, {$record->floor}, {$record->room}")
                    ->required(),
                Forms\Components\Select::make('personnel_id')
                    ->required()
                    ->relationship('personnel', 'name'),
                Forms\Components\Select::make('status_id')
                    ->required()
                    ->relationship('status', 'name'),
                Forms\Components\TextInput::make('tag_number')
                    ->required(),
                Forms\Components\TextInput::make('model_number')
                    ->required(),
                Forms\Components\TextInput::make('serial_number')
                    ->required(),
                Forms\Components\DatePicker::make('purchase_date')
                    ->required(),
                Forms\Components\TextInput::make('purchase_price')
                    ->required()->numeric(),
                Forms\Components\TextInput::make('warrant')
                    ->required()->numeric(),
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

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    public static function getNavigationBadgeColor(): ?array
    {
        return Color::Pink;
    }
}
