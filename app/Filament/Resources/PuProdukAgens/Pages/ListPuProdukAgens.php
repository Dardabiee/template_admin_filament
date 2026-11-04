<?php

namespace App\Filament\Resources\PuProdukAgens\Pages;

use App\Filament\Resources\PuProdukAgens\PuProdukAgenResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListPuProdukAgens extends ListRecords
{
    protected static string $resource = PuProdukAgenResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
