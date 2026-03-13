<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SiteSettingResource\Pages;
use App\Models\SiteSetting;
use Filament\Forms;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class SiteSettingResource extends Resource
{
    protected static ?string $model = SiteSetting::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Configuración de Contacto')
                ->description('Define los enlaces y números de contacto del sitio.')
                ->schema([
                    TextInput::make('label')
                        ->label('Nombre del campo')
                        ->placeholder('Ej: Enlace de Facebook')
                        ->required(),

                    TextInput::make('key')
                        ->label('Llave (Identificador)')
                        ->placeholder('Ej: facebook')
                        ->required()
                        ->unique(ignoreRecord: true)
                        ->helperText('Usa solo minúsculas y sin espacios (ej: whatsapp_link)'),

                    Select::make('type')
                        ->label('Tipo de dato')
                        ->options([
                            'text' => 'Texto plano',
                            'url' => 'Enlace (URL)',
                            'tel' => 'Teléfono',
                        ])
                        ->default('text'),

                    Textarea::make('value')
                        ->label('Contenido / Valor')
                        ->rows(3)
                        ->required(),
                ])->columns(2)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('label')
                ->label('Nombre')
                ->searchable()
                ->sortable(),

                TextColumn::make('key')
                ->label('Llave')
                ->copyable() // Muy útil para copiar la llave y usarla en el código
                ->fontFamily('mono')
                ->color('gray'),

                TextColumn::make('value')
                ->label('Valor')
                ->limit(50),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListSiteSettings::route('/'),
            'create' => Pages\CreateSiteSetting::route('/create'),
            'edit' => Pages\EditSiteSetting::route('/{record}/edit'),
        ];
    }
}
