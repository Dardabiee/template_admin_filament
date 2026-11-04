<?php

namespace App\Filament\Resources\QbgSops\Pages;

use App\Filament\Resources\QbgSops\QbgSopResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditQbgSop extends EditRecord
{
    protected static string $resource = QbgSopResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
