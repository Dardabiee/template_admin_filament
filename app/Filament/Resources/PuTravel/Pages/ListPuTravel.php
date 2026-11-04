<?php

namespace App\Filament\Resources\PuTravel\Pages;

use App\Filament\Resources\PuTravel\PuTravelResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListPuTravel extends ListRecords
{
    protected static string $resource = PuTravelResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
