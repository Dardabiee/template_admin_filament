<?php

namespace App\Filament\Resources\PuDeklarasis\Pages;

use App\Filament\Resources\PuDeklarasis\PuDeklarasiResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditPuDeklarasi extends EditRecord
{
    protected static string $resource = PuDeklarasiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
