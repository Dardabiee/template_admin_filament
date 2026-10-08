<?php

namespace App\Filament\Resources\KpsReimbusts\Pages;

use App\Filament\Resources\KpsReimbusts\KpsReimbustResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditKpsReimbust extends EditRecord
{
    protected static string $resource = KpsReimbustResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
