<?php

namespace App\Filament\Resources\Userlevels\Pages;

use App\Filament\Resources\Userlevels\UserlevelResource;
use App\Filament\Resources\Userlevels\Schemas\UserlevelForm;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListUserlevels extends ListRecords
{
    protected static string $resource = UserlevelResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()
            ->label('Tambah Userlevel')
            ->modalHeading('Buat Userlevel baru')
            ->modalWidth('2xl')
            ->form(fn ($form) => UserlevelForm::configure($form))
        ];
    }
}
