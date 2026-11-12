<?php

namespace App\Filament\Resources\MacReimbusts\Pages;

use App\Filament\Resources\MacReimbusts\MacReimbustResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditMacReimbust extends EditRecord
{
    protected static string $resource = MacReimbustResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
