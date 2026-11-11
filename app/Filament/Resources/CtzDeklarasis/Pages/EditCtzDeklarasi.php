<?php

namespace App\Filament\Resources\CtzDeklarasis\Pages;

use App\Filament\Resources\CtzDeklarasis\CtzDeklarasiResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditCtzDeklarasi extends EditRecord
{
    protected static string $resource = CtzDeklarasiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
