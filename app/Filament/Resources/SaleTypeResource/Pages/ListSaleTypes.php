<?php

namespace App\Filament\Resources\SaleTypeResource\Pages;

use App\Filament\Resources\SaleTypeResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSaleTypes extends ListRecords
{
    protected static string $resource = SaleTypeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
