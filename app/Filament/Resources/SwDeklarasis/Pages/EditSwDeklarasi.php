<?php

namespace App\Filament\Resources\SwDeklarasis\Pages;

use App\Filament\Resources\SwDeklarasis\SwDeklarasiResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditSwDeklarasi extends EditRecord
{
    protected static string $resource = SwDeklarasiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
