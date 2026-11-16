<?php

namespace App\Filament\Resources\SmlSops\Pages;

use App\Filament\Resources\SmlSops\SmlSopResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditSmlSop extends EditRecord
{
    protected static string $resource = SmlSopResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
