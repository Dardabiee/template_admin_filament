<?php

namespace App\Filament\Resources\SwiSks\Pages;

use App\Filament\Resources\SwiSks\SwiSkResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditSwiSk extends EditRecord
{
    protected static string $resource = SwiSkResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
