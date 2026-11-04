<?php

namespace App\Filament\Resources\PuNotifikasis\Pages;

use App\Filament\Resources\PuNotifikasis\PuNotifikasiResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditPuNotifikasi extends EditRecord
{
    protected static string $resource = PuNotifikasiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
