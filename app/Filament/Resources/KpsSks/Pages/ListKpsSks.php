<?php

namespace App\Filament\Resources\KpsSks\Pages;

use App\Filament\Resources\KpsSks\KpsSkResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListKpsSks extends ListRecords
{
    protected static string $resource = KpsSkResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
