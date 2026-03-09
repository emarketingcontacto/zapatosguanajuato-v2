<?php

namespace App\Filament\Resources\ShoeModelResource\Pages;

use App\Filament\Resources\ShoeModelResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListShoeModels extends ListRecords
{
    protected static string $resource = ShoeModelResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
