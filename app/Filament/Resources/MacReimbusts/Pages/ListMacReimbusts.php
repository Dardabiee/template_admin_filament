<?php

namespace App\Filament\Resources\MacReimbusts\Pages;

use App\Filament\Resources\MacReimbusts\MacReimbustResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListMacReimbusts extends ListRecords
{
    protected static string $resource = MacReimbustResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
