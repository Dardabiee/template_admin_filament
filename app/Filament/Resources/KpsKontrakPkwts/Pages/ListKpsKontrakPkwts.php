<?php

namespace App\Filament\Resources\KpsKontrakPkwts\Pages;

use App\Filament\Resources\KpsKontrakPkwts\KpsKontrakPkwtResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListKpsKontrakPkwts extends ListRecords
{
    protected static string $resource = KpsKontrakPkwtResource::class;

    // protected function getHeaderActions(): array
    // {
    //     return [
    //         CreateAction::make(),
    //     ];
    // }
}
