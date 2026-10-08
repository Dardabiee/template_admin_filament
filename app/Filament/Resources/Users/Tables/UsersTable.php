<?php

namespace App\Filament\Resources\Users\Tables;

use App\Filament\Resources\Users\Schemas\UserForm;
use Filament\Actions\DeleteAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Enums\RecordActionsPosition;
use Filament\Tables\Table;


class UsersTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')
                    ->label('#')
                    ->sortable()
                    ->width('60px'),
                TextColumn::make('name')
                    ->searchable(),
                TextColumn::make('email')
                    ->label('Email address')
                    ->searchable(),
                TextColumn::make('roles.name')
                    ->searchable(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                ToggleColumn::make('is_active')
                    ->label('Aktif')
                    ->getStateUsing(fn ($record) => $record->is_active === 'Y')
                    // Menyimpan kembali ke database menjadi 'Y' atau 'N' saat toggle diklik di tabel
                    ->updateStateUsing(function ($record, $state) {
                        $record->is_active = $state ? 'Y' : 'N';
                        $record->save();
                    }),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->Actions([
                 EditAction::make()
                ->iconButton()
                ->modalHeading('Edit User')
                ->modalWidth('3xl')
                ->authorize('update')
                ->form(fn ($form) => UserForm::configure($form))->after(function ($livewire) {
                    $livewire->js("window.location.reload()");
                }),
                DeleteAction::make()
                ->iconButton()
                ->after(function ($livewire) {
                    $livewire->js("window.location.reload()");
                })
                ->authorize('delete')
            ],position: RecordActionsPosition::BeforeCells);
    }
}
