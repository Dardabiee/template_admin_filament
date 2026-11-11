<?php

namespace App\Filament\Resources\SwiReimbusts\Pages;

use App\Filament\Resources\SwiReimbusts\SwiReimbustResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditSwiReimbust extends EditRecord
{
    protected static string $resource = SwiReimbustResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
