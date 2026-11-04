<?php

namespace App\Filament\Resources\PuSks\Pages;

use App\Filament\Resources\PuSks\PuSkResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListPuSks extends ListRecords
{
    protected static string $resource = PuSkResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
