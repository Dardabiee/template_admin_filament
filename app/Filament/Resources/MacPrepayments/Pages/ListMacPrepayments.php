<?php

namespace App\Filament\Resources\MacPrepayments\Pages;

use App\Filament\Resources\MacPrepayments\MacPrepaymentResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListMacPrepayments extends ListRecords
{
    protected static string $resource = MacPrepaymentResource::class;

    // protected function getHeaderActions(): array
    // {
    //     return [
    //         CreateAction::make()->authorize('create'),
    //     ];
    // }
}
