<?php

namespace App\Filament\Resources\QbgProduks\Pages;

use App\Filament\Resources\QbgProduks\QbgProdukResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListQbgProduks extends ListRecords
{
    protected static string $resource = QbgProdukResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
