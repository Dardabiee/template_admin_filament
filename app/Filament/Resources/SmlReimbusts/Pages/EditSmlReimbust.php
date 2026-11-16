<?php

namespace App\Filament\Resources\SmlReimbusts\Pages;

use App\Filament\Resources\SmlReimbusts\SmlReimbustResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditSmlReimbust extends EditRecord
{
    protected static string $resource = SmlReimbustResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
