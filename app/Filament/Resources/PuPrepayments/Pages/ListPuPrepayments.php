<?php

namespace App\Filament\Resources\PuPrepayments\Pages;

use App\Filament\Resources\PuPrepayments\PuPrepaymentResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListPuPrepayments extends ListRecords
{
    protected static string $resource = PuPrepaymentResource::class;

    // protected function getHeaderActions(): array
    // {
    //     return [
    //         CreateAction::make(),
    //     ];
    // }
}
