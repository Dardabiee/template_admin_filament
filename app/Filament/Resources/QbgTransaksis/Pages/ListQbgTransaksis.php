<?php

namespace App\Filament\Resources\QbgTransaksis\Pages;

use App\Filament\Resources\QbgTransaksis\QbgTransaksiResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListQbgTransaksis extends ListRecords
{
    protected static string $resource = QbgTransaksiResource::class;

    // protected function getHeaderActions(): array
    // {
    //     return [
    //         CreateAction::make(),
    //     ];
    // }
}
