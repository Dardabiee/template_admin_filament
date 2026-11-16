<?php

namespace App\Filament\Resources\SmlReimbusts\Pages;

use App\Filament\Resources\SmlReimbusts\SmlReimbustResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListSmlReimbusts extends ListRecords
{
    protected static string $resource = SmlReimbustResource::class;

    // protected function getHeaderActions(): array
    // {
    //     return [
    //         CreateAction::make()->authorize('create'),
    //     ];
    // }
}
