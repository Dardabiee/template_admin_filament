<?php

namespace App\Filament\Resources\KpsKaryawans\Pages;

use App\Filament\Resources\KpsKaryawans\KpsKaryawanResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListKpsKaryawans extends ListRecords
{
    protected static string $resource = KpsKaryawanResource::class;

    // protected function getHeaderActions(): array
    // {
    //     return [
    //         CreateAction::make(),
    //     ];
    // }
}
