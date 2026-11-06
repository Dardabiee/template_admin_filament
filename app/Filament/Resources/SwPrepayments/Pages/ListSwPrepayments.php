<?php

namespace App\Filament\Resources\SwPrepayments\Pages;

use App\Filament\Resources\SwPrepayments\SwPrepaymentResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListSwPrepayments extends ListRecords
{
    protected static string $resource = SwPrepaymentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
