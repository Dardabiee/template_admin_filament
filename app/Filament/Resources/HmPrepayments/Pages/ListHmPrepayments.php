<?php

namespace App\Filament\Resources\HmPrepayments\Pages;

use App\Filament\Resources\HmPrepayments\HmPrepaymentResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListHmPrepayments extends ListRecords
{
    protected static string $resource = HmPrepaymentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
