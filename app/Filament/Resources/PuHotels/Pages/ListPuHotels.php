<?php

namespace App\Filament\Resources\PuHotels\Pages;

use App\Filament\Resources\PuHotels\PuHotelResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListPuHotels extends ListRecords
{
    protected static string $resource = PuHotelResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
