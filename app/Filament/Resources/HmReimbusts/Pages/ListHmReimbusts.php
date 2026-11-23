<?php

namespace App\Filament\Resources\HmReimbusts\Pages;

use App\Filament\Resources\HmReimbusts\HmReimbustResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListHmReimbusts extends ListRecords
{
    protected static string $resource = HmReimbustResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
