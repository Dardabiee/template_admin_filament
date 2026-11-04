<?php

namespace App\Filament\Resources\PuSops\Pages;

use App\Filament\Resources\PuSops\PuSopResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditPuSop extends EditRecord
{
    protected static string $resource = PuSopResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
