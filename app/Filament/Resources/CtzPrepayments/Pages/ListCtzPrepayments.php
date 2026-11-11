<?php

namespace App\Filament\Resources\CtzPrepayments\Pages;

use App\Filament\Resources\CtzPrepayments\CtzPrepaymentResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListCtzPrepayments extends ListRecords
{
    protected static string $resource = CtzPrepaymentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
