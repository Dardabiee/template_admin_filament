<?php

namespace App\Filament\Resources\SmlDeklarasis\Pages;

use App\Filament\Resources\SmlDeklarasis\SmlDeklarasiResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListSmlDeklarasis extends ListRecords
{
    protected static string $resource = SmlDeklarasiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()->authorize('create'),
        ];
    }
}
