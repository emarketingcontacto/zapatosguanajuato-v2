<?php

namespace App\Filament\Resources\ShoeModelResource\Pages;

use App\Filament\Resources\ShoeModelResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditShoeModel extends EditRecord
{
    protected static string $resource = ShoeModelResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
