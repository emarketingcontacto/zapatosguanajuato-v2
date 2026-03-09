<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ShoeModelResource\Pages;
// use App\Filament\Resources\ShoeModelResource\RelationManagers;
use App\Models\ShoeModel;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
// use Illuminate\Database\Eloquent\Builder;
// use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

class ShoeModelResource extends Resource
{
    protected static ?string $model = ShoeModel::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Group::make()
                ->schema([
                    Section::make('Detalles del Calzado')
                        ->schema([
                            TextInput::make('name')
                                ->label('Nombre del Modelo')
                                ->required()
                                ->placeholder('Ej: Bota Vaquera 204'),

                            TextInput::make('sku')
                                ->label('SKU / Código')
                                ->unique(ignoreRecord: true),

                            Textarea::make('description')
                                ->label('Descripción')
                                ->rows(3),

                            TextInput::make('price')
                                ->label('Precio Sugerido')
                                ->numeric()
                                ->prefix('$'),



                        ])->columns(2),
                ])->columnSpan(['lg' => 2]),

            Group::make()
                ->schema([
                    Section::make('Clasificación')
                        ->schema([
                             Toggle::make('is_active')
                                ->label('Activo'),

                            Select::make('business_id')
                                ->label('Fábrica/Dueño')
                                ->relationship('business', 'name')
                                ->searchable()
                                ->preload()
                                ->required(),

                            Select::make('material_id')
                                ->label('Material')
                                ->relationship('material', 'name')
                                ->preload(),

                            Select::make('season_id')
                                ->label('Temporada')
                                ->relationship('season', 'name')
                                ->preload(),

                            Select::make('gender')
                                ->label('Genero/Segmento')
                                ->options([
                                    'hombres' => 'Hombre',
                                    'mujer' => 'Mujer',
                                    'ninos' => 'Niño',
                                    'ninas' => 'Niña',
                                    'unisex' => 'Unisex',
                                ])
                                ->required(),
                            Select::make('subcategory_id')
                                ->label('Tipo de Calzado')
                                ->relationship('subcategory', 'name')
                                ->searchable()
                                ->preload()
                                ->createOptionForm([
                                    TextInput::make('name')
                                    ->required()
                                    ->live(onBlur:true)
                                    ->afterStateUpdated(fn($state, callable $set)=>$set('slug',Str::slug($state))),
                                    TextInput::make('slug')->required(),
                                ])
                        ]),


                ])->columnSpan(['lg' => 1]),
            Group::make()
                ->schema([
                    Section::make('Imagen del Modelo')
                        ->schema([
                            FileUpload::make('image')
                                ->label('Foto Principal')
                                ->image()
                                ->imageEditor()
                                ->directory('shoe-models')
                                ->saveUploadedFileUsing(function ($file) {
                                    $manager = new ImageManager(new Driver());
                                    $image = $manager->read($file);
                                    $image->scale(width: 600);
                                    $nombreArchivo = Str::uuid() . '.webp';
                                    $rutaDestino = 'shoe-models/' . $nombreArchivo;
                                    Storage::disk('public')->put($rutaDestino, $image->toWebp(70));
                                    return $rutaDestino;
                                }),
                        ]),
                ])->columnSpan(2),
            ])->columns(3);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image')
                ->label('Foto'),

            TextColumn::make('name')
                ->label('Modelo')
                ->searchable()
                ->sortable(),

            TextColumn::make('business.name')
                ->label('Fábrica')
                ->sortable(),

            TextColumn::make('material.name')
                ->label('Material'),

            TextColumn::make('price')
                ->label('Precio')
                ->money('MXN')
                ->sortable(),

            ToggleColumn::make('is_active')
                ->label('Activo'),
            TextColumn::make('gender')
                ->label('Genero')
                ->badge()
                ->color('grey')
                ->sortable(),
            ])
            ->filters([
                //Filtro por Proveedor
                SelectFilter::make('business_id')
                    ->label('Filtrar por Proveedor')
                    ->relationship('business', 'name')
                    ->searchable()
                    ->preload(),
                // Filtro por Genero
                SelectFilter::make('gender')
                    ->options([
                        'Caballero'=>'Caballero',
                        'Dama' => 'Dama',
                        'Niño' => 'Niño',
                        'Niña' => 'Niña',
                        'Unisex' => 'Unisex',
                        ]),
                //Tipo de calzado (Subcategory)
                SelectFilter::make('subcategory_id')
                    ->label('Tipo Calzado')
                    ->relationship('subcategory', 'name')
                    ->preload(),
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
            'index' => Pages\ListShoeModels::route('/'),
            'create' => Pages\CreateShoeModel::route('/create'),
            'edit' => Pages\EditShoeModel::route('/{record}/edit'),
        ];
    }
}
