<?php

namespace App\Filament\Resources\MacSops\Pages;

use App\Filament\Resources\MacSops\MacSopResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditMacSop extends EditRecord
{
    protected static string $resource = MacSopResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
