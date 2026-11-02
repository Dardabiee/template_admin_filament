<?php

namespace App\Filament\Resources\PuInvoices\Pages;

use App\Filament\Resources\PuInvoices\PuInvoiceResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditPuInvoice extends EditRecord
{
    protected static string $resource = PuInvoiceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
