<?php

namespace App\Filament\Resources\BmnSks\Pages;

use App\Filament\Resources\BmnSks\BmnSkResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListBmnSks extends ListRecords
{
    protected static string $resource = BmnSkResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
