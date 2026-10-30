<?php

namespace App\Filament\Resources\PuPenawarans\Pages;

use App\Filament\Resources\PuPenawarans\PuPenawaranResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditPuPenawaran extends EditRecord
{
    protected static string $resource = PuPenawaranResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
