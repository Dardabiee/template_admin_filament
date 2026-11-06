<?php

namespace App\Filament\Resources\SwReimbusts\Pages;

use App\Filament\Resources\SwReimbusts\SwReimbustResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListSwReimbusts extends ListRecords
{
    protected static string $resource = SwReimbustResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
