<?php

namespace App\Filament\Resources\CtzReimbusts\Pages;

use App\Filament\Resources\CtzReimbusts\CtzReimbustResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditCtzReimbust extends EditRecord
{
    protected static string $resource = CtzReimbustResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
