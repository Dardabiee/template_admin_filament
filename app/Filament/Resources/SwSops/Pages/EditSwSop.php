<?php

namespace App\Filament\Resources\SwSops\Pages;

use App\Filament\Resources\SwSops\SwSopResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditSwSop extends EditRecord
{
    protected static string $resource = SwSopResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
