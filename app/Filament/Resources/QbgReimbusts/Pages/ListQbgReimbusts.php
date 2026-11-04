<?php

namespace App\Filament\Resources\QbgReimbusts\Pages;

use App\Filament\Resources\QbgReimbusts\QbgReimbustResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListQbgReimbusts extends ListRecords
{
    protected static string $resource = QbgReimbustResource::class;

    // protected function getHeaderActions(): array
    // {
    //     return [
    //         CreateAction::make(),
    //     ];
    // }
}
