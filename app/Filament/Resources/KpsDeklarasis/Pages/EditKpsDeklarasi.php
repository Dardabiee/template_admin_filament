<?php

namespace App\Filament\Resources\KpsDeklarasis\Pages;

use App\Filament\Resources\KpsDeklarasis\KpsDeklarasiResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditKpsDeklarasi extends EditRecord
{
    protected static string $resource = KpsDeklarasiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
