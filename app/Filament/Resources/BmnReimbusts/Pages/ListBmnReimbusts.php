<?php

namespace App\Filament\Resources\BmnReimbusts\Pages;

use App\Filament\Resources\BmnReimbusts\BmnReimbustResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListBmnReimbusts extends ListRecords
{
    protected static string $resource = BmnReimbustResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
