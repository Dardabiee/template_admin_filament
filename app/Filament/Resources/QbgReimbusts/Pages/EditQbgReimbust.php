<?php

namespace App\Filament\Resources\QbgReimbusts\Pages;

use App\Filament\Resources\QbgReimbusts\QbgReimbustResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditQbgReimbust extends EditRecord
{
    protected static string $resource = QbgReimbustResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
