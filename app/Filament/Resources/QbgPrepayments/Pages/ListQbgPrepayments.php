<?php

namespace App\Filament\Resources\QbgPrepayments\Pages;

use App\Filament\Resources\QbgPrepayments\QbgPrepaymentResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListQbgPrepayments extends ListRecords
{
    protected static string $resource = QbgPrepaymentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
