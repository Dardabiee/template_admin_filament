<?php

namespace App\Filament\Resources\PuInvoices\Pages;

use App\Filament\Resources\PuInvoices\PuInvoiceResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListPuInvoices extends ListRecords
{
    protected static string $resource = PuInvoiceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()->visible(fn () => auth()->user()?->hasAnyRole(['Super Admin', 'Admin', 'Finance', 'Direksi'])),
        ];
    }
}
