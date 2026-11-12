<?php

namespace App\Filament\Resources\MacDeklarasis\Pages;

use App\Filament\Resources\MacDeklarasis\MacDeklarasiResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListMacDeklarasis extends ListRecords
{
    protected static string $resource = MacDeklarasiResource::class;

    // protected function getHeaderActions(): array
    // {
    //     return [
    //         CreateAction::make()->authorize('create'),
    //     ];
    // }
}
