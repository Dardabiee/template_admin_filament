<?php

namespace App\Filament\Resources\PuTandaTerimas\Pages;

use App\Filament\Resources\PuTandaTerimas\PuTandaTerimaResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditPuTandaTerima extends EditRecord
{
    protected static string $resource = PuTandaTerimaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
