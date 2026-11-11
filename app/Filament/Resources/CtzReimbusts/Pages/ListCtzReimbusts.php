<?php

namespace App\Filament\Resources\CtzReimbusts\Pages;

use App\Filament\Resources\CtzReimbusts\CtzReimbustResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListCtzReimbusts extends ListRecords
{
    protected static string $resource = CtzReimbustResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
