<?php

namespace App\Filament\Main\Resources;

use App\Filament\Main\Resources\MaintenanceHistoryResource\Pages;
use App\Models\MaintenanceHistory;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Model;

class MaintenanceHistoryResource extends Resource
{
    protected static ?string $model = MaintenanceHistory::class;

    protected static ?int $navigationSort = 6;


    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('asset_id')->nullable()
                    ->relationship('asset', 'tag_number')
                    ->required()
                    ->getOptionLabelFromRecordUsing(fn (Model $record) => "{$record->tag_number} - {$record->model_number}"),
                Forms\Components\DatePicker::make('maintenance_date')
                    ->label('Maintenance Date')
                    ->required(),
                Forms\Components\Textarea::make('maintenance_performed')
                    ->required()
                    ->label('Maintenance Performed')
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('asset.tag_number')->searchable()
                    ->formatStateUsing(fn (Model $record) => "{$record->asset->tag_number} - {$record->asset->model_number}"),
                Tables\Columns\TextColumn::make('maintenance_performed')->searchable(),
                Tables\Columns\TextColumn::make('maintenance_date')->searchable(),
            ])
            ->filters([])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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
