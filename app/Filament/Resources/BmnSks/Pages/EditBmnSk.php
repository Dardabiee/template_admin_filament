<?php

namespace App\Filament\Resources\BmnSks\Pages;

use App\Filament\Resources\BmnSks\BmnSkResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditBmnSk extends EditRecord
{
    protected static string $resource = BmnSkResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
