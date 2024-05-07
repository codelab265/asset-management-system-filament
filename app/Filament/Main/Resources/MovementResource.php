<?php

namespace App\Filament\Main\Resources;

use App\Filament\Main\Resources\MovementResource\Pages;
use App\Models\Movement;
use Filament\Forms;
use Filament\Forms\Components\Section;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Model;

class MovementResource extends Resource
{
    protected static ?string $model = Movement::class;

    protected static ?int $navigationSort = 8;


    protected static ?string $navigationIcon = 'heroicon-o-arrows-right-left';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make()
                    ->schema([
                        Forms\Components\Select::make('asset_id')
                            ->required()
                            ->label('Asset')
                            ->relationship('asset', 'tag_number')
                            ->getOptionLabelFromRecordUsing(fn (Model $record) => "{$record->tag_number} - {$record->model_number}")
                            ->columnSpanFull(),

                        Forms\Components\Select::make('previous_department_id')
                            ->relationship('previousDepartment', 'building')
                            ->getOptionLabelFromRecordUsing(fn (Model $record) => "{$record->building}, {$record->floor}, {$record->room}")
                            ->required()
                            ->label('Previous Department'),

                        Forms\Components\Select::make('previous_personnel_id')
                            ->relationship('previousPersonnel', 'name')
                            ->required()
                            ->label('Previous Personnel'),

                        Forms\Components\Select::make('current_department_id')
                            ->relationship('CurrentDepartment', 'building')
                            ->getOptionLabelFromRecordUsing(fn (Model $record) => "{$record->building}, {$record->floor}, {$record->room}")
                            ->required()
                            ->label('Current Department'),

                        Forms\Components\Select::make('current_personnel_id')
                            ->relationship('CurrentPersonnel', 'name')
                            ->required()
                            ->label('Current Personnel'),

                        Forms\Components\DatePicker::make('moved_date')
                            ->label('Moved Date')
                            ->required(),
                    ])
                    ->columns(2)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('asset.tag_number')
                    ->formatStateUsing(fn (Model $record) => "{$record->asset->tag_number} - {$record->asset->model_number}"),
                Tables\Columns\TextColumn::make('CurrentDepartment.building')
                    ->label('Department')
                    ->description(fn ($record) => 'Old Department: ' . $record->previousDepartment->building . ', ' . $record->previousDepartment->floor . '-' . $record->previousDepartment->room),
                Tables\Columns\TextColumn::make('currentPersonnel.name')
                    ->label('Personnel')
                    ->description(fn ($record) => 'Old Personnel: ' . $record->previousPersonnel->name),
                Tables\Columns\TextColumn::make('moved_date'),
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
            'index' => Pages\ListMovements::route('/'),
            'create' => Pages\CreateMovement::route('/create'),
            'edit' => Pages\EditMovement::route('/{record}/edit'),
        ];
    }
}
