<?php

namespace App\Filament\Resources\MacDeklarasis\Pages;

use App\Filament\Resources\MacDeklarasis\MacDeklarasiResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditMacDeklarasi extends EditRecord
{
    protected static string $resource = MacDeklarasiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
