<?php

namespace App\Filament\Resources\QbgSops\Pages;

use App\Filament\Resources\QbgSops\QbgSopResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use Filament\Schemas\Components\Tabs\Tab;
use Illuminate\Database\Query\Builder;

class ListQbgSops extends ListRecords
{
    protected static string $resource = QbgSopResource::class;

    // protected function getHeaderActions(): array
    // {
    //     return [
    //         CreateAction::make(),
    //     ];
    // }

    public function getTabs(): array{
        
        return [
            'all' => Tab::make('Semua Dokumen')
                ->badge(fn () => \App\Models\QbgSop::count()),

            'sop' => Tab::make('SOP')
                ->modifyQueryUsing(fn (Builder $query) => $query->where('jenis', 'SOP'))
                ->badge(fn () => \App\Models\QbgSop::where('jenis', 'SOP')->count()),

            'juklak' => Tab::make('Juklak')
                ->modifyQueryUsing(fn (Builder $query) => $query->where('jenis', 'Juklak'))
                ->badge(fn () => \App\Models\QbgSop::where('jenis', 'Juklak')->count()),

            'juknis' => Tab::make('Juknis')
                ->modifyQueryUsing(fn (Builder $query) => $query->where('jenis', 'Juknis'))
                ->badge(fn () => \App\Models\QbgSop::where('jenis', 'Juknis')->count()),

            'skp' => Tab::make('SK Penunjang')
                ->modifyQueryUsing(fn (Builder $query) => $query->where('jenis', 'SK Penunjang'))
                ->badge(fn () => \App\Models\QbgSop::where('jenis', 'SK Penunjang')->count()),
        ];
    }
}
