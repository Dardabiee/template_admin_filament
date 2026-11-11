<?php

namespace App\Filament\Resources\BmnSops\Pages;

use App\Filament\Resources\BmnSops\BmnSopResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditBmnSop extends EditRecord
{
    protected static string $resource = BmnSopResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
