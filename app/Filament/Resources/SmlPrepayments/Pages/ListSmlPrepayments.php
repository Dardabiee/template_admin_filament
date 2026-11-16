<?php

namespace App\Filament\Resources\SmlPrepayments\Pages;

use App\Filament\Resources\SmlPrepayments\SmlPrepaymentResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListSmlPrepayments extends ListRecords
{
    protected static string $resource = SmlPrepaymentResource::class;

    // protected function getHeaderActions(): array
    // {
    //     return [
    //         CreateAction::make()->authorize('create'),
    //     ];
    // }
}
