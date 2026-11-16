<?php

namespace App\Filament\Resources\SmlSks\Pages;

use App\Filament\Resources\SmlSks\SmlSkResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListSmlSks extends ListRecords
{
    protected static string $resource = SmlSkResource::class;

    // protected function getHeaderActions(): array
    // {
    //     return [
    //         CreateAction::make()->authorize('create')->authorize('create'),
    //     ];
    // }
}
