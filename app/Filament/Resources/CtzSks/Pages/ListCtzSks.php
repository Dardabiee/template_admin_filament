<?php

namespace App\Filament\Resources\CtzSks\Pages;

use App\Filament\Resources\CtzSks\CtzSkResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListCtzSks extends ListRecords
{
    protected static string $resource = CtzSkResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
