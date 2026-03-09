<?php

namespace App\Filament\Resources\PremiumResource\Pages;

use App\Filament\Resources\PremiumResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPremium extends EditRecord
{
    protected static string $resource = PremiumResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
