<?php

namespace App\Filament\Resources\SmlSks\Pages;

use App\Filament\Resources\SmlSks\SmlSkResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditSmlSk extends EditRecord
{
    protected static string $resource = SmlSkResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
