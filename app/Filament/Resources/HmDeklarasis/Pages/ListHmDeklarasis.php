<?php

namespace App\Filament\Resources\HmDeklarasis\Pages;

use App\Filament\Resources\HmDeklarasis\HmDeklarasiResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListHmDeklarasis extends ListRecords
{
    protected static string $resource = HmDeklarasiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
