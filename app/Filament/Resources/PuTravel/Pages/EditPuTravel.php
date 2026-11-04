<?php

namespace App\Filament\Resources\PuTravel\Pages;

use App\Filament\Resources\PuTravel\PuTravelResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditPuTravel extends EditRecord
{
    protected static string $resource = PuTravelResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
