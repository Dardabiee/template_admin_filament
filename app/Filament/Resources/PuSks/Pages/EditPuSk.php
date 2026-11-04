<?php

namespace App\Filament\Resources\PuSks\Pages;

use App\Filament\Resources\PuSks\PuSkResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditPuSk extends EditRecord
{
    protected static string $resource = PuSkResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
