<?php

namespace App\Filament\Resources\QbgDeklarasis\Pages;

use App\Filament\Resources\QbgDeklarasis\QbgDeklarasiResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditQbgDeklarasi extends EditRecord
{
    protected static string $resource = QbgDeklarasiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
