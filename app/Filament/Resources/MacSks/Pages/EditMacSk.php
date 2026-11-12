<?php

namespace App\Filament\Resources\MacSks\Pages;

use App\Filament\Resources\MacSks\MacSkResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditMacSk extends EditRecord
{
    protected static string $resource = MacSkResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
