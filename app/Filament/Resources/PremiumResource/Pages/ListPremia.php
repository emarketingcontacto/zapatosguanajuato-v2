<?php

namespace App\Filament\Resources\PremiumResource\Pages;

use App\Filament\Resources\PremiumResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPremia extends ListRecords
{
    protected static string $resource = PremiumResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
