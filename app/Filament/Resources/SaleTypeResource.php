<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SaleTypeResource\Pages;
use App\Filament\Resources\SaleTypeResource\RelationManagers;
use App\Models\SaleType;
use Filament\Forms;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SaleTypeResource extends Resource
{
    protected static ?string $model = SaleType::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->required()
                    ->placeholder('Ej: Mayoreo, Menudeo...'),
                Textarea::make('conditions')
                    ->label('Condiciones o Notas')
                    ->rows(3),
            ])->columns(1);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('Nombre')
                    ->sortable(),
                TextColumn::make('conditions')
                    ->label('Condiciones'),
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
            'index' => Pages\ListSaleTypes::route('/'),
            'create' => Pages\CreateSaleType::route('/create'),
            'edit' => Pages\EditSaleType::route('/{record}/edit'),
        ];
    }
}
