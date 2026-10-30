<?php

namespace App\Filament\Resources\PuPenawarans\Pages;

use App\Filament\Resources\PuPenawarans\PuPenawaranResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListPuPenawarans extends ListRecords
{
    protected static string $resource = PuPenawaranResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
