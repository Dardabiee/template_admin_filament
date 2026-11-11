<?php

namespace App\Filament\Resources\SwiDeklarasis\Pages;

use App\Filament\Resources\SwiDeklarasis\SwiDeklarasiResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListSwiDeklarasis extends ListRecords
{
    protected static string $resource = SwiDeklarasiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
