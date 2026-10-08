<?php

namespace App\Filament\Resources\KpsReimbusts\Pages;

use App\Filament\Resources\KpsReimbusts\KpsReimbustResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListKpsReimbusts extends ListRecords
{
    protected static string $resource = KpsReimbustResource::class;

    // protected function getHeaderActions(): array
    // {
    //     return [
    //         CreateAction::make(),
    //     ];
    // }
}
