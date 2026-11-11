<?php

namespace App\Filament\Resources\SwiDeklarasis\Pages;

use App\Filament\Resources\SwiDeklarasis\SwiDeklarasiResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditSwiDeklarasi extends EditRecord
{
    protected static string $resource = SwiDeklarasiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
