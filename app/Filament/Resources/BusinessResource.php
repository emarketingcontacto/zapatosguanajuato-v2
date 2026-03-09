<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BusinessResource\Pages;
// use App\Filament\Resources\BusinessResource\RelationManagers;
use App\Models\Business;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
// use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\Tabs\Tab;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
// use Illuminate\Database\Eloquent\Builder;
// use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

class BusinessResource extends Resource
{
    protected static ?string $model = Business::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
           ->schema([
           Tabs::make('Nuevo Negocio')
                ->tabs([
                    // Pestaña 1: Datos Generales
                    Tab::make('Información Básica')
                        ->icon('heroicon-o-building-storefront')
                        ->schema([
                            TextInput::make('name')
                                ->label('Nombre del Negocio')
                                ->required()
                                ->live(onBlur: true)
                                ->afterStateUpdated(fn ($state, callable $set) => $set('slug', Str::slug($state))),

                            TextInput::make('slug')
                                ->required()
                                ->unique(ignoreRecord: true),

                            Textarea::make('description')
                                ->label('Descripción'),

                            Select::make('category_id')
                                ->label('Giro/Categoría')
                                ->relationship('category', 'name')
                                ->searchable()
                                ->preload()
                                ->required(),

                            Select::make('sale_type_id')
                                ->label('Tipo de Venta')
                                ->relationship('saleType', 'name')
                                ->preload(),
                        ])->columns(2),

                    // Pestaña 2: Contacto y Ubicación
                    Tab::make('Ubicación y Contacto')
                        ->icon('heroicon-o-map-pin')
                        ->schema([
                            TextInput::make('contact_person')->label('Persona de Contacto'),
                            TextInput::make('phone')->label('Teléfono Fijo')->tel(),
                            TextInput::make('whatsapp')->label('WhatsApp')->tel()->prefix('+52'),
                            TextInput::make('email')->email(),
                            TextInput::make('facebook')->label('Facebook')->url(),
                            TextInput::make('website')->label('website')->url(),
                            TextInput::make('neighborhood')->label('Colonia'),
                            TextInput::make('street_number')->label('Calle y Número'),
                            TextInput::make('lat')->label('Latitud'),
                            TextInput::make('lon')->label('Longitud'),
                        ])->columns(2),

                    // Pestaña 3: Multimedia y Otros
                    Tab::make('Extras')
                        ->icon('heroicon-o-camera')
                        ->schema([
                            FileUpload::make('image')
                                ->label('Foto del Negocio / Logo')
                                ->image()
                                ->directory('businesses-logos')
                                ->imageEditor()
                                ->saveUploadedFileUsing(function($file){
                                    try {
                                        //iniciar imagen con driver
                                        $manager = new ImageManager(new Driver());
                                        //Leer imagen subida
                                        $image= $manager->read($file);
                                        //Redimensionar imagen
                                        $image->scale(width:800);
                                        //crear nombre y ruta
                                        $nombreArchivo = Str::uuid(). '.webp';
                                        $rutaDestino = 'businesses-logos/'. $nombreArchivo;
                                        //calidad 80
                                        Storage::disk('public')->put(
                                            $rutaDestino,
                                            $image->toWebp(70)
                                        );
                                        return $rutaDestino;

                                    } catch (\Exception $e) {
                                        //error handler
                                        return $file->store('businesses-logos', 'public');
                                    }
                                }),

                            DatePicker::make('last_visit')
                                ->label('Última Visita')
                                ->displayFormat('d/m/Y'),
                        ]),
                ])->columnSpanFull(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image')
                    ->label('Logo')
                    ->circular(),
                TextColumn::make('name')
                    ->label('Negocio')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('category.name')
                    ->label('Categoria')
                    ->badge()
                    ->color(fn(string $state): string => match ($state) {
                        'Fabricante' => 'success',
                        'Mayorista' => 'warning',
                        'Minorista' => 'info',
                        default => 'gray'
                    })
                    ->sortable()
                    ->searchable(),
                TextColumn::make('city')
                    ->label('Ciudad')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('whatsapp')
                ->label('whatsApp')
                ->icon('heroicon-m-phone')
                ->url(fn($state)=> $state ? "https://wa.me/52". preg_replace('/[^0-9]/', '', $state):null)
                ->openUrlInNewTab(),
                TextColumn::make('shoe_models_count')
                    ->counts('shoeModels')
                    ->label('Total Modelos')
                    ->badge()
                    ->color('info'),
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
            'index' => Pages\ListBusinesses::route('/'),
            'create' => Pages\CreateBusiness::route('/create'),
            'edit' => Pages\EditBusiness::route('/{record}/edit'),
        ];
    }
}
