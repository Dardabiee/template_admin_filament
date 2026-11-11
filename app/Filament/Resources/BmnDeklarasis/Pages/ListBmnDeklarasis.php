<?php

namespace App\Filament\Resources\BmnDeklarasis\Pages;

use App\Filament\Resources\BmnDeklarasis\BmnDeklarasiResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListBmnDeklarasis extends ListRecords
{
    protected static string $resource = BmnDeklarasiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
