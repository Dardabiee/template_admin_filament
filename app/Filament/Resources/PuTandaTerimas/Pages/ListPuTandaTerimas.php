<?php

namespace App\Filament\Resources\PuTandaTerimas\Pages;

use App\Filament\Resources\PuTandaTerimas\PuTandaTerimaResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListPuTandaTerimas extends ListRecords
{
    protected static string $resource = PuTandaTerimaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
