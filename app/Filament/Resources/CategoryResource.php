<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CategoryResource\Pages;
// use App\Filament\Resources\CategoryResource\RelationManagers;
use App\Models\Category;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
// use Illuminate\Database\Eloquent\Builder;
// use Illuminate\Database\Eloquent\SoftDeletingScope;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class CategoryResource extends Resource
{
    protected static ?string $model = Category::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->label('Nombre')
                    ->required()
                    ->live(onBlur:true)
                    ->afterStateUpdated(fn ($state, callable $set) => $set('slug', Str::slug($state))),

                TextInput::make('slug')
                    ->label('Slug')
                    ->required()
                    ->unique(),

                FileUpload::make('image')
                    ->image()
                    ->directory('categories')
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
                            $rutaDestino = 'categories/'. $nombreArchivo;
                            //calidad 80
                            Storage::disk('public')->put(
                                $rutaDestino,
                                $image->toWebp(80)
                            );
                            return $rutaDestino;

                        } catch (\Exception $e) {
                            //error handler
                            return $file->store('categories', 'public');
                        }
                    }),
            ])->columns(1);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image')
                    ->label('Logo')
                    ->circular(),
                TextColumn::make('name')
                    ->label('name')
                    ->sortable(),
                TextColumn::make('slug')
                    ->label('Slug')
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
            'index' => Pages\ListCategories::route('/'),
            'create' => Pages\CreateCategory::route('/create'),
            'edit' => Pages\EditCategory::route('/{record}/edit'),
        ];
    }
}
