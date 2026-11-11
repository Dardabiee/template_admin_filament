<?php

namespace App\Filament\Resources\CtzSks\Pages;

use App\Filament\Resources\CtzSks\CtzSkResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditCtzSk extends EditRecord
{
    protected static string $resource = CtzSkResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
