<?php

namespace App\Filament\Pages;

use App\Services\DataLinkService;
use BackedEnum;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Filament\Actions\Action;
use Filament\Actions\CreateAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;

class ListDataLink extends Page implements HasTable, HasForms
{
    use InteractsWithTable;
    use InteractsWithForms;

    protected static bool $shouldRegisterNavigation = false;
    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-document-text';
    protected string $view = 'filament.pages.list-data-link';
    protected static ?string $navigationLabel = 'Data Crew & Member';
    protected static ?string $title = 'Data Link Crew & Member';

    public string $activeTab = 'crew';

    public function switchTab(string $tab): void
    {
        $this->activeTab = $tab;
        $this->resetTable();
    }

    public function table(Table $table): Table
    {
        $service = app(DataLinkService::class);

        if ($this->activeTab === 'crew') {
            return $table
                ->query(null)
                ->columns([
                    TextColumn::make('id')->label('ID')->searchable(),
                    TextColumn::make('nama')->label('Nama Crew')->searchable(),
                    TextColumn::make('noHP')->label('Nomor HP'),
                    TextColumn::make('link')
                        ->label('Link Kunjungan')
                        ->getStateUsing(fn ($record) => 'https://link.pengenumroh.com/?ref=' . ($record['id'] ?? ''))
                        ->url(fn ($record) => 'https://link.pengenumroh.com/?ref=' . ($record['id'] ?? ''))
                        ->openUrlInNewTab()
                        ->color('primary'),
                    ImageColumn::make('qr_code')
                        ->label('QR Code')
                        ->getStateUsing(fn ($record) => 'https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=' . urlencode('https://link.pengenumroh.com/?ref=' . ($record['id'] ?? '')))
                        ->width(50)
                        ->height(50),
                ])
                ->headerActions([
                    CreateAction::make('addCrew')
                        ->label('Tambah Crew')
                        ->form([
                            TextInput::make('nama_crew')->label('Nama Crew')->required(),
                            TextInput::make('no_hp')->label('No HP')->tel()->required(),
                        ])
                        ->action(function (array $data) use ($service) {
                            $response = $service->sendPostRequest('https://link.pengenumroh.com/api/addCrew.php', $data);
                            if (!empty($response['status'])) {
                                Notification::make()->success()->title('Crew berhasil ditambahkan')->send();
                            } else {
                                Notification::make()->danger()->title($response['message'] ?? 'Gagal')->send();
                            }
                        })
                ])
                ->actions([
                    // Menggunakan Action biasa untuk Edit Crew
                    Action::make('editCrew')
                        ->label('')
                        ->icon('heroicon-m-pencil-square')
                        ->color('warning')
                        ->form([
                            TextInput::make('nama_crew')->label('Nama Crew')->required(),
                            TextInput::make('no_hp')->label('No HP')->required(),
                        ])
                        ->fillForm(fn ($record) => [
                            'nama_crew' => $record['nama'] ?? '',
                            'no_hp' => $record['noHP'] ?? '',
                        ])
                        ->action(function ($record, array $data) use ($service) {
                            $payload = [
                                'id' => $record['id'],
                                'nama_crew' => $data['nama_crew'],
                                'no_hp' => $data['no_hp'],
                            ];
                            $service->sendJsonPostRequest('https://link.pengenumroh.com/api/updateCrew.php', $payload);
                            Notification::make()->success()->title('Crew berhasil diperbarui')->send();
                        }),

                    // Menggunakan Action biasa untuk Delete Crew
                    Action::make('deleteCrew')
                        ->label('')
                        ->icon('heroicon-m-trash')
                        ->color('danger')
                        ->requiresConfirmation()
                        ->action(function ($record) use ($service) {
                            $service->sendDeleteRequest('https://link.pengenumroh.com/api/deleteCrew.php', ['id' => $record['id']]);
                            Notification::make()->success()->title('Crew berhasil dihapus')->send();
                        })
                ])
                ->records(fn () => $service->getCrewData());
        } else {
            return $table
                ->query(null)
                ->columns([
                    TextColumn::make('idMember')->label('ID Member')->searchable(),
                    TextColumn::make('namaMember')->label('Nama Member')->searchable(),
                    TextColumn::make('link')
                        ->label('Link Kunjungan')
                        ->getStateUsing(fn ($record) => 'https://link.pengenumroh.com/?mb=' . ($record['idMember'] ?? ''))
                        ->url(fn ($record) => 'https://link.pengenumroh.com/?mb=' . ($record['idMember'] ?? ''))
                        ->openUrlInNewTab()
                        ->color('primary'),
                    ImageColumn::make('qr_code')
                        ->label('QR Code')
                        ->getStateUsing(fn ($record) => 'https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=' . urlencode('https://link.pengenumroh.com/?mb=' . ($record['idMember'] ?? '')))
                        ->width(50)
                        ->height(50),
                ])
                ->headerActions([
                    CreateAction::make('addMember')
                        ->label('Tambah Member')
                        ->form([
                            TextInput::make('nama_member')->label('Nama Member')->required(),
                        ])
                        ->action(function (array $data) use ($service) {
                            $service->sendJsonPostRequest('https://link.pengenumroh.com/api/addMember.php', $data);
                            Notification::make()->success()->title('Member berhasil ditambahkan')->send();
                        })
                ])
                ->actions([
                    // Menggunakan Action biasa untuk Edit Member
                    Action::make('editMember')
                        ->label('Edit')
                        ->icon('heroicon-m-pencil-square')
                        ->color('warning')
                        ->form([
                            TextInput::make('nama_member')->label('Nama Member')->required(),
                        ])
                        ->fillForm(fn ($record) => [
                            'nama_member' => $record['namaMember'] ?? '',
                        ])
                        ->action(function ($record, array $data) use ($service) {
                            $payload = [
                                'id_member' => $record['idMember'],
                                'nama_member' => $data['nama_member'],
                            ];
                            $service->sendJsonPostRequest('https://link.pengenumroh.com/api/updateMember.php', $payload);
                            Notification::make()->success()->title('Member berhasil diperbarui')->send();
                        }),

                    // Menggunakan Action biasa untuk Delete Member
                    Action::make('deleteMember')
                        ->label('Hapus')
                        ->icon('heroicon-m-trash')
                        ->color('danger')
                        ->requiresConfirmation()
                        ->action(function ($record) use ($service) {
                            $service->sendDeleteRequest('https://link.pengenumroh.com/api/deleteMember.php', ['idMember' => $record['idMember']]);
                            Notification::make()->success()->title('Member berhasil dihapus')->send();
                        })
                ])
                ->records(fn () => $service->getMemberData());
        }
    }
}