<?php

namespace App\Filament\Resources\CtzSops\Pages;

use App\Filament\Resources\CtzSops\CtzSopResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditCtzSop extends EditRecord
{
    protected static string $resource = CtzSopResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
