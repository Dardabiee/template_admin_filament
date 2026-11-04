<?php

namespace App\Filament\Resources\QbgSks\Pages;

use App\Filament\Resources\QbgSks\QbgSkResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListQbgSks extends ListRecords
{
    protected static string $resource = QbgSkResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
