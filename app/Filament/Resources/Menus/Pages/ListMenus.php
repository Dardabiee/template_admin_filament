<?php

namespace App\Filament\Resources\Menus\Pages;

use App\Filament\Resources\Menus\MenuResource;
use App\Filament\Resources\Menus\Schemas\MenuForm;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListMenus extends ListRecords
{
    protected static string $resource = MenuResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()
            ->label('Tambah Menu')
            ->modalHeading('Buat Menu Baru')
            ->modalWidth('3xl')
            ->after(function ($livewire) {
                    $livewire->js("window.location.reload()");
            })
            ->form(fn ($form) => MenuForm::configure($form))
            ->authorize('create')

        ];
    }
}
