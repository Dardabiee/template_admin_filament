<?php

namespace App\Filament\Resources\Userlevels\Tables;

use App\Filament\Resources\Userlevels\Schemas\UserlevelForm;
use Filament\Actions\Action;
use Filament\Actions\DeleteAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\CheckboxList;
use Filament\Notifications\Notification;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Spatie\Permission\Models\Permission;

class UserlevelsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('level_name')
                    ->label('Nama User Level')
                    ->searchable()
                    ->sortable()
                    ->weight('bold'),

                // Menampilkan badge jumlah permission yang aktif (UX Tambahan)
                TextColumn::make('permissions_count')
                    ->label('Jumlah Akses')
                    ->counts('permissions')
                    ->badge()
                    ->color('info'),

                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->actions([
                // 1. Action Modal Matrix Checklist Hak Akses
                Action::make('managePermissions')
                    ->label('Atur Akses')
                    ->icon('heroicon-o-shield-check')
                    ->color('warning')
                    ->modalHeading(fn ($record) => "Atur Hak Akses: {$record->level_name}")
                    ->modalDescription('Ceklis modul dan fitur yang diizinkan untuk level pengguna ini.')
                    ->modalWidth('3xl')
                    
                    // Pre-fill permission ID yang sudah dicentang/dimiliki oleh userlevel ini
                    ->fillForm(fn ($record) => [
                        'permissions' => $record->permissions()->pluck('permissions.id')->toArray(),
                    ])
                    
                    // Form Matrix Checklist
                    ->form(function () {
                        // Ambil semua permission & kelompokkan berdasarkan nama Modul/Resource-nya
                        $permissions = Permission::all()->groupBy(function ($permission) {
                            $parts = explode('_', $permission->name);
                            return count($parts) > 1 ? ucfirst(end($parts)) : 'Umum';
                        });

                        $sections = [];

                        foreach ($permissions as $moduleName => $modulePermissions) {
                            $sections[] = Section::make("Modul {$moduleName}")
                                ->collapsible()
                                ->compact()
                                ->schema([
                                    CheckboxList::make("permissions")
                                        ->hiddenLabel()
                                        ->options(
                                            $modulePermissions->pluck('name', 'id')->mapWithKeys(function ($name, $id) {
                                                // Formatting label dari 'view_any_menu' -> 'View Any'
                                                $cleanName = str_replace(['_', 'any'], [' ', ' any'], $name);
                                                return [$id => ucwords($cleanName)];
                                            })->toArray()
                                        )
                                        ->columns(5) // 2 Kolom centangan
                                        ->bulkToggleable(), // Tombol Select All / Deselect All per modul
                                ]);
                        }

                        return [
                            Grid::make(1)->schema($sections), // Layout 2 grid card di dalam modal
                        ];
                    })
                    
                    // Eksekusi Simpan Sync Relasi ke Pivot Table Spatie
                    ->action(function ($record, array $data): void {
                        $permissionIds = $data['permissions'] ?? [];
                        
                        // Sync relasi permissions pada model Userlevel / Role
                        $record->permissions()->sync($permissionIds);

                        Notification::make()
                            ->title('Hak Akses Berhasil Diperbarui')
                            ->body("Akses untuk level {$record->level_name} telah disimpan.")
                            ->success()
                            ->send();
                    }),

                // 2. Action Edit Modal Bawaan Kamu
                EditAction::make()
                    ->iconButton()
                    ->modalHeading('Edit Userlevel')
                    ->modalWidth('2xl')
                    ->form(fn ($form) => UserlevelForm::configure($form)),

                // 3. Action Delete
                DeleteAction::make()->iconButton(),
            ]);
    }
}