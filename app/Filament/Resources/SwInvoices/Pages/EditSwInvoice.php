<?php

namespace App\Filament\Resources\SwInvoices\Pages;

use App\Filament\Resources\SwInvoices\SwInvoiceResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditSwInvoice extends EditRecord
{
    protected static string $resource = SwInvoiceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
