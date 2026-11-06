<?php

namespace App\Filament\Resources\SwReimbusts\Pages;

use App\Filament\Resources\SwReimbusts\SwReimbustResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditSwReimbust extends EditRecord
{
    protected static string $resource = SwReimbustResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
