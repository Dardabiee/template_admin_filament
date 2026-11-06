<?php

namespace App\Filament\Resources\SwDeklarasis\Pages;

use App\Filament\Resources\SwDeklarasis\SwDeklarasiResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListSwDeklarasis extends ListRecords
{
    protected static string $resource = SwDeklarasiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
