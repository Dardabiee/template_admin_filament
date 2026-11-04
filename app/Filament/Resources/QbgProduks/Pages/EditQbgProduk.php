<?php

namespace App\Filament\Resources\QbgProduks\Pages;

use App\Filament\Resources\QbgProduks\QbgProdukResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditQbgProduk extends EditRecord
{
    protected static string $resource = QbgProdukResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
