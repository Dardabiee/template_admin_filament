<?php

namespace App\Filament\Resources\SwSks\Pages;

use App\Filament\Resources\SwSks\SwSkResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListSwSks extends ListRecords
{
    protected static string $resource = SwSkResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()
            ->authorize('create'),
        ];
    }
}
