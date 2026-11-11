<?php

namespace App\Filament\Resources\SwiSops\Pages;

use App\Filament\Resources\SwiSops\SwiSopResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use Filament\Schemas\Components\Tabs\Tab;
use Illuminate\Database\Eloquent\Builder;

class ListSwiSops extends ListRecords
{
    protected static string $resource = SwiSopResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()
            ->authorize('create'),
        ];
    }

    public function getTabs(): array{
        
        return [
            'all' => Tab::make('Semua Dokumen')
                ->badge(fn () => \App\Models\SwSop::count()),

            'sop' => Tab::make('SOP')
                ->modifyQueryUsing(fn (Builder $query) => $query->where('jenis', 'SOP'))
                ->badge(fn () => \App\Models\SwSop::where('jenis', 'SOP')->count()),

            'juklak' => Tab::make('Juklak')
                ->modifyQueryUsing(fn (Builder $query) => $query->where('jenis', 'Juklak'))
                ->badge(fn () => \App\Models\SwSop::where('jenis', 'Juklak')->count()),

            'juknis' => Tab::make('Juknis')
                ->modifyQueryUsing(fn (Builder $query) => $query->where('jenis', 'Juknis'))
                ->badge(fn () => \App\Models\SwSop::where('jenis', 'Juknis')->count()),

            'skp' => Tab::make('SK Penunjang')
                ->modifyQueryUsing(fn (Builder $query) => $query->where('jenis', 'SK Penunjang'))
                ->badge(fn () => \App\Models\SwSop::where('jenis', 'SK Penunjang')->count()),
        ];
    }
}
