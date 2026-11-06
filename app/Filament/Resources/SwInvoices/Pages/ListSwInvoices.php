<?php

namespace App\Filament\Resources\SwInvoices\Pages;

use App\Filament\Resources\SwInvoices\SwInvoiceResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListSwInvoices extends ListRecords
{
    protected static string $resource = SwInvoiceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
