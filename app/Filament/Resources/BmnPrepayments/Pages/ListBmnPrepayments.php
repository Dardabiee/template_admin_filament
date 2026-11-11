<?php

namespace App\Filament\Resources\BmnPrepayments\Pages;

use App\Filament\Resources\BmnPrepayments\BmnPrepaymentResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListBmnPrepayments extends ListRecords
{
    protected static string $resource = BmnPrepaymentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
