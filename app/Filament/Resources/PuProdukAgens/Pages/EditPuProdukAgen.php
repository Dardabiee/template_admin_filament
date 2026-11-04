<?php

namespace App\Filament\Resources\PuProdukAgens\Pages;

use App\Filament\Resources\PuProdukAgens\PuProdukAgenResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditPuProdukAgen extends EditRecord
{
    protected static string $resource = PuProdukAgenResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
