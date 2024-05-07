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
use Illuminate\Database\Eloquent\Model;

class DisposalResource extends Resource
{
    protected static ?string $model = Disposal::class;

    protected static ?int $navigationSort = 7;

    protected static ?string $navigationIcon = 'heroicon-o-archive-box-x-mark';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('asset_id')->nullable()
                    ->relationship(
                        name: 'asset',
                        titleAttribute: 'tag_number',
                        modifyQueryUsing: fn ($query) => $query->where('disposed', false)
                    )
                    ->label('Asset')
                    ->required()
                    ->getOptionLabelFromRecordUsing(fn (Model $record) => "{$record->tag_number} - {$record->model_number}"),
                Forms\Components\TextInput::make('reason')->required()->label('Reason'),
                Forms\Components\DatePicker::make('disposed_date')->required()->label('Disposed_date'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('asset.tag_number')
                    ->formatStateUsing(fn (Model $record) => "{$record->asset->tag_number} - {$record->asset->model_number}")
                    ->searchable(),
                Tables\Columns\TextColumn::make('reason')->searchable(),
                Tables\Columns\TextColumn::make('disposed_date')
                    ->date()
                    ->formatStateUsing(fn (Model $record) => date('Y-m-d', strtotime($record->disposed_date)))
                    ->searchable(),

            ])
            ->filters([])
            ->actions([
                Tables\Actions\DeleteAction::make()

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
