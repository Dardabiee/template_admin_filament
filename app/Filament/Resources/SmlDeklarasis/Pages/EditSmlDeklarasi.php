<?php

namespace App\Filament\Resources\SmlDeklarasis\Pages;

use App\Filament\Resources\SmlDeklarasis\SmlDeklarasiResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditSmlDeklarasi extends EditRecord
{
    protected static string $resource = SmlDeklarasiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
