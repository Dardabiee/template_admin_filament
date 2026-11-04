<?php

namespace App\Filament\Resources\KpsSops\Pages;

use App\Filament\Resources\KpsSops\KpsSopResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditKpsSop extends EditRecord
{
    protected static string $resource = KpsSopResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
