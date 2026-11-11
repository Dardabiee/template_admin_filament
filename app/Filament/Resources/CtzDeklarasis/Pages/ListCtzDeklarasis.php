<?php

namespace App\Filament\Resources\CtzDeklarasis\Pages;

use App\Filament\Resources\CtzDeklarasis\CtzDeklarasiResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListCtzDeklarasis extends ListRecords
{
    protected static string $resource = CtzDeklarasiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
