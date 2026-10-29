<?php

namespace App\Filament\Resources\PuDeklarasis\Pages;

use App\Filament\Resources\PuDeklarasis\PuDeklarasiResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListPuDeklarasis extends ListRecords
{
    protected static string $resource = PuDeklarasiResource::class;

    // protected function getHeaderActions(): array
    // {
    //     return [
    //         CreateAction::make(),
    //     ];
    // }
}
