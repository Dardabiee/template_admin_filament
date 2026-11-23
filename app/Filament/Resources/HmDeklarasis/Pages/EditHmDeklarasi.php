<?php

namespace App\Filament\Resources\HmDeklarasis\Pages;

use App\Filament\Resources\HmDeklarasis\HmDeklarasiResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditHmDeklarasi extends EditRecord
{
    protected static string $resource = HmDeklarasiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
