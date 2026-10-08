<?php

namespace App\Filament\Resources\KpsKontrakPkwts\Pages;

use App\Filament\Resources\KpsKontrakPkwts\KpsKontrakPkwtResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewKpsKontrakPkwt extends ViewRecord
{
    protected static string $resource = KpsKontrakPkwtResource::class;

    // protected function getHeaderActions(): array
    // {
    //     return [
    //         EditAction::make(),
    //     ];
    // }
}
