<?php

namespace App\Filament\Resources\SaleTypeResource\Pages;

use App\Filament\Resources\SaleTypeResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSaleType extends EditRecord
{
    protected static string $resource = SaleTypeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
