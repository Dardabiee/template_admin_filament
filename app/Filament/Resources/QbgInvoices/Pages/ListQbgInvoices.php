<?php

namespace App\Filament\Resources\QbgInvoices\Pages;

use App\Filament\Resources\QbgInvoices\QbgInvoiceResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListQbgInvoices extends ListRecords
{
    protected static string $resource = QbgInvoiceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
