<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PremiumResource\Pages;
use App\Models\Premium;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;

class PremiumResource extends Resource
{
    protected static ?string $model = Premium::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('business_id')
                ->relationship('business', 'name') // Usa la relación que creamos
                ->searchable()
                ->preload()
                ->required()
                ->label('Negocio'),

            DatePicker::make('start_date')
                ->required()
                ->default(now())
                ->label('Fecha de Inicio'),

            DatePicker::make('end_date')
                ->required()
                ->default(now()->addMonth()) // Sugiere un mes por defecto
                ->label('Fecha de Vencimiento'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('business.name')
                ->label('Negocio')
                ->sortable()
                ->searchable(),

            TextColumn::make('start_date')
                ->date()
                ->label('Inicia')
                ->sortable(),

            TextColumn::make('end_date')
                ->date()
                ->label('Vence')
                ->sortable()
                ->color(fn ($state) => $state < now() ? 'danger' : 'success'), // Rojo si ya venció
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPremia::route('/'),
            'create' => Pages\CreatePremium::route('/create'),
            'edit' => Pages\EditPremium::route('/{record}/edit'),
        ];
    }
}
