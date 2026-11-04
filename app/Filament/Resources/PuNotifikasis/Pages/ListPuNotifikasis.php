<?php

namespace App\Filament\Resources\PuNotifikasis\Pages;

use App\Filament\Resources\PuNotifikasis\PuNotifikasiResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListPuNotifikasis extends ListRecords
{
    protected static string $resource = PuNotifikasiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
