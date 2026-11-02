<?php

namespace App\Filament\Resources\PuAgens\Pages;

use App\Filament\Resources\PuAgens\PuAgenResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListPuAgens extends ListRecords
{
    protected static string $resource = PuAgenResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
