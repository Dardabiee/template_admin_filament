<?php

namespace App\Filament\Resources\SmlSops\Pages;

use App\Filament\Resources\SmlSops\SmlSopResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use Filament\Schemas\Components\Tabs\Tab;
use Illuminate\Database\Eloquent\Builder;

class ListSmlSops extends ListRecords
{
    protected static string $resource = SmlSopResource::class;

    // protected function getHeaderActions(): array
    // {
    //     return [
    //         CreateAction::make()->authorize('create'),
    //     ];
    // }

    public function getTabs(): array{
        
        return [
            'all' => Tab::make('Semua Dokumen')
                ->badge(fn () => \App\Models\SmlSop::count()),

            'sop' => Tab::make('SOP')
                ->modifyQueryUsing(fn (Builder $query) => $query->where('jenis', 'SOP'))
                ->badge(fn () => \App\Models\SmlSop::where('jenis', 'SOP')->count()),

            'juklak' => Tab::make('Juklak')
                ->modifyQueryUsing(fn (Builder $query) => $query->where('jenis', 'Juklak'))
                ->badge(fn () => \App\Models\SmlSop::where('jenis', 'Juklak')->count()),

            'juknis' => Tab::make('Juknis')
                ->modifyQueryUsing(fn (Builder $query) => $query->where('jenis', 'Juknis'))
                ->badge(fn () => \App\Models\SmlSop::where('jenis', 'Juknis')->count()),

            'skp' => Tab::make('SK Penunjang')
                ->modifyQueryUsing(fn (Builder $query) => $query->where('jenis', 'SK Penunjang'))
                ->badge(fn () => \App\Models\SmlSop::where('jenis', 'SK Penunjang')->count()),
        ];
    }
}
