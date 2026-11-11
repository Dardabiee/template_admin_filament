<?php

namespace App\Filament\Resources\BmnDeklarasis\Pages;

use App\Filament\Resources\BmnDeklarasis\BmnDeklarasiResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditBmnDeklarasi extends EditRecord
{
    protected static string $resource = BmnDeklarasiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
