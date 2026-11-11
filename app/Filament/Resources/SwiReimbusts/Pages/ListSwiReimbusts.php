<?php

namespace App\Filament\Resources\SwiReimbusts\Pages;

use App\Filament\Resources\SwiReimbusts\SwiReimbustResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListSwiReimbusts extends ListRecords
{
    protected static string $resource = SwiReimbustResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
