<?php

namespace App\Filament\Resources\SwSks\Pages;

use App\Filament\Resources\SwSks\SwSkResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditSwSk extends EditRecord
{
    protected static string $resource = SwSkResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
