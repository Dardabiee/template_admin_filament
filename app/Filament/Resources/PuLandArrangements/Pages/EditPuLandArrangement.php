<?php

namespace App\Filament\Resources\PuLandArrangements\Pages;

use App\Filament\Resources\PuLandArrangements\PuLandArrangementResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditPuLandArrangement extends EditRecord
{
    protected static string $resource = PuLandArrangementResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
