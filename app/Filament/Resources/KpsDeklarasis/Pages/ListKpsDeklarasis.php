<?php

namespace App\Filament\Resources\KpsDeklarasis\Pages;

use App\Filament\Resources\KpsDeklarasis\KpsDeklarasiResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListKpsDeklarasis extends ListRecords
{
    protected static string $resource = KpsDeklarasiResource::class;

    // protected function getHeaderActions(): array
    // {
    //     return [
    //         CreateAction::make(),
    //     ];
    // }
}
