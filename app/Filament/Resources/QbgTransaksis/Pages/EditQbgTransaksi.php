<?php

namespace App\Filament\Resources\QbgTransaksis\Pages;

use App\Filament\Resources\QbgTransaksis\QbgTransaksiResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditQbgTransaksi extends EditRecord
{
    protected static string $resource = QbgTransaksiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
