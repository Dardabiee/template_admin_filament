<?php

namespace App\Filament\Resources\PuHotels\Pages;

use App\Filament\Resources\PuHotels\PuHotelResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditPuHotel extends EditRecord
{
    protected static string $resource = PuHotelResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
