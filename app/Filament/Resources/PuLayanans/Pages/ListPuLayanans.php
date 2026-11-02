<?php

namespace App\Filament\Resources\PuLayanans\Pages;

use App\Filament\Resources\PuLayanans\PuLayananResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListPuLayanans extends ListRecords
{
    protected static string $resource = PuLayananResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
