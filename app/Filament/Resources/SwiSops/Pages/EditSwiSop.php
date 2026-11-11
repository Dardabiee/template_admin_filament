<?php

namespace App\Filament\Resources\SwiSops\Pages;

use App\Filament\Resources\SwiSops\SwiSopResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditSwiSop extends EditRecord
{
    protected static string $resource = SwiSopResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
