<?php

namespace App\Filament\Resources\HmReimbusts\Pages;

use App\Filament\Resources\HmReimbusts\HmReimbustResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditHmReimbust extends EditRecord
{
    protected static string $resource = HmReimbustResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
