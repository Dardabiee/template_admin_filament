<?php

namespace App\Filament\Resources\PuReimbusts\Pages;

use App\Filament\Resources\PuReimbusts\PuReimbustResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditPuReimbust extends EditRecord
{
    protected static string $resource = PuReimbustResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
