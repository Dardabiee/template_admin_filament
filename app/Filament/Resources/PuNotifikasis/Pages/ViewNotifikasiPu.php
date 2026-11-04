<?php

namespace App\Filament\Resources\PuNotifikasis\Pages;

use App\Filament\Resources\PuNotifikasis\PuNotifikasiResource;
use App\Models\PuNotifikasi;
use BackedEnum;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;
use Illuminate\Contracts\Support\Htmlable;

class ViewNotifikasiPu extends ViewRecord
{
    protected static string $resource = PuNotifikasiResource::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-document-text';
    protected string $view = 'filament.pages.view-notifikasi-pu';
    protected static ?string $navigationLabel = 'Form Notifikasi';

}
