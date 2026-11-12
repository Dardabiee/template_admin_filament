<?php

namespace App\Filament\Resources\MacSks\Pages;

use App\Filament\Resources\MacSks\MacSkResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListMacSks extends ListRecords
{
    protected static string $resource = MacSkResource::class;

    // protected function getHeaderActions(): array
    // {
    //     return [
    //         CreateAction::make(),
    //     ];
    // }
}
