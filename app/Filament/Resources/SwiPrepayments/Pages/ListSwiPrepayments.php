<?php

namespace App\Filament\Resources\SwiPrepayments\Pages;

use App\Filament\Resources\SwiPrepayments\SwiPrepaymentResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListSwiPrepayments extends ListRecords
{
    protected static string $resource = SwiPrepaymentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
