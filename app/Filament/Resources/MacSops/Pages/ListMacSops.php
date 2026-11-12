<?php

namespace App\Filament\Resources\MacSops\Pages;

use App\Filament\Resources\MacSops\MacSopResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use Filament\Schemas\Components\Tabs\Tab;
use Illuminate\Database\Eloquent\Builder;

class ListMacSops extends ListRecords
{
    protected static string $resource = MacSopResource::class;

    // protected function getHeaderActions(): array
    // {
    //     return [
    //         CreateAction::make()->authorize('create'),
    //     ];
    // }

     public function getTabs(): array
    {
        return [
            'all' => Tab::make('Semua Dokumen')
                ->badge(fn () => \App\Models\PuSop::count()),

            'sop' => Tab::make('SOP')
                ->modifyQueryUsing(fn (Builder $query) => $query->where('jenis', 'SOP'))
                ->badge(fn () => \App\Models\PuSop::where('jenis', 'SOP')->count()),

            'juklak' => Tab::make('Juklak')
                ->modifyQueryUsing(fn (Builder $query) => $query->where('jenis', 'Juklak'))
                ->badge(fn () => \App\Models\PuSop::where('jenis', 'Juklak')->count()),

            'juknis' => Tab::make('Juknis')
                ->modifyQueryUsing(fn (Builder $query) => $query->where('jenis', 'Juknis'))
                ->badge(fn () => \App\Models\PuSop::where('jenis', 'Juknis')->count()),

            'skp' => Tab::make('SK Penunjang')
                ->modifyQueryUsing(fn (Builder $query) => $query->where('jenis', 'SK Penunjang'))
                ->badge(fn () => \App\Models\PuSop::where('jenis', 'SK Penunjang')->count()),
        ];
    }
}
