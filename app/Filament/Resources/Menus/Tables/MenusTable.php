<?php

namespace App\Filament\Resources\Menus\Tables;

use App\Filament\Resources\Menus\Schemas\MenuForm;
use Filament\Actions\DeleteAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Enums\RecordActionsPosition;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class MenusTable
{
    public static function configure(Table $table): Table
    {   
        return $table
            ->poll('10s')
            ->columns([
                // TextColumn::make('id')
                //     ->label('ID')
                //     ->sortable()
                //     ->width('60px')
                //     ,
                TextColumn::make('title')
                    ->label('Nama Menu')
                    ->searchable()
                    ->sortable()
                    ->weight('bold')
                    ->description(fn ($record) => $record->route),

                TextColumn::make('parent.title')
                    ->label('Parent Menu')
                    ->placeholder('Parent Menu')
                    ->badge()
                    ->color('gray'),

                TextColumn::make('url')
                    ->label('Url')
                    ->placeholder('Url / Route')
                    ->badge()
                    ->color('gray'),
                TextColumn::make('order')
                    ->label('Order')
                    ->sortable()
                    ->width('60px'),
                IconColumn::make('icon')
                    ->label('Icon')
                    ->icon(fn (string $state): string => $state ?: 'heroicon-o-minus'),

                // Menggunakan ToggleColumn agar admin bisa langsung aktif/nonaktifkan dari tabel tanpa masuk form edit
                ToggleColumn::make('is_active')
                    ->label('Aktif'),
            ])
            ->defaultSort('order', 'asc')
            ->filters([
                SelectFilter::make('parent_id')
                    ->label('Filter Tipe')
                    ->options([
                        'null' => 'Menu Utama',
                        'not_null' => 'Submenu',
                    ]) 
                    ->query(fn (Builder $query, array $data ) => match ($data ['value']){
                         'null' => $query->whereNull('parent_id'),
                        'not_null' => $query->whereNotNull('parent_id'),
                        default => $query,
                    }) ,
            ])
            ->actions([
                EditAction::make()
                ->iconButton()
                ->modalHeading('Edit Menu')
                ->modalWidth('3xl')
                ->form(fn ($form) => MenuForm::configure($form))
                ->after(function ($livewire) {
                    $livewire->js("window.location.reload()");
                })
                ->authorize('update'),
                DeleteAction::make()
                ->iconButton()
                ->after(function ($livewire) {
                    $livewire->js("window.location.reload()");
                })
                ->authorize('delete')

            ],position: RecordActionsPosition::BeforeCells);
    }
}