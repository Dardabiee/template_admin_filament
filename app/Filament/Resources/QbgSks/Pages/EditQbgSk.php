<?php

namespace App\Filament\Resources\QbgSks\Pages;

use App\Filament\Resources\QbgSks\QbgSkResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditQbgSk extends EditRecord
{
    protected static string $resource = QbgSkResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
