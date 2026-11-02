<?php

namespace App\Filament\Resources\PuLandArrangements\Pages;

use App\Filament\Resources\PuLandArrangements\PuLandArrangementResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListPuLandArrangements extends ListRecords
{
    protected static string $resource = PuLandArrangementResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
