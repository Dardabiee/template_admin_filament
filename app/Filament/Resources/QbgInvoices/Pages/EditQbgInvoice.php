<?php

namespace App\Filament\Resources\QbgInvoices\Pages;

use App\Filament\Resources\QbgInvoices\QbgInvoiceResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditQbgInvoice extends EditRecord
{
    protected static string $resource = QbgInvoiceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
