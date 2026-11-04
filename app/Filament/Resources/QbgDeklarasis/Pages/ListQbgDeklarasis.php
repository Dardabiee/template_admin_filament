<?php

namespace App\Filament\Resources\QbgDeklarasis\Pages;

use App\Filament\Resources\QbgDeklarasis\QbgDeklarasiResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListQbgDeklarasis extends ListRecords
{
    protected static string $resource = QbgDeklarasiResource::class;

    // protected function getHeaderActions(): array
    // {
    //     return [
    //         CreateAction::make(),
    //     ];
    // }
}
