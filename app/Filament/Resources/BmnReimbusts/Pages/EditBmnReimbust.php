<?php

namespace App\Filament\Resources\BmnReimbusts\Pages;

use App\Filament\Resources\BmnReimbusts\BmnReimbustResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditBmnReimbust extends EditRecord
{
    protected static string $resource = BmnReimbustResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
