<?php

namespace App\Filament\Resources\KpsPrepayments\Pages;

use App\Filament\Resources\KpsPrepayments\KpsPrepaymentResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListKpsPrepayments extends ListRecords
{
    protected static string $resource = KpsPrepaymentResource::class;

    // protected function getHeaderActions(): array
    // {
    //     return [
    //         CreateAction::make(),
    //     ];
    // }
}
