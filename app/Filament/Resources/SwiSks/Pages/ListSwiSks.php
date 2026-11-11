<?php

namespace App\Filament\Resources\SwiSks\Pages;

use App\Filament\Resources\SwiSks\SwiSkResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListSwiSks extends ListRecords
{
    protected static string $resource = SwiSkResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
