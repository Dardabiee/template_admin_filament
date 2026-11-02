<?php

namespace App\Filament\Resources\PuLayanans\Pages;

use App\Filament\Resources\PuLayanans\PuLayananResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditPuLayanan extends EditRecord
{
    protected static string $resource = PuLayananResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
