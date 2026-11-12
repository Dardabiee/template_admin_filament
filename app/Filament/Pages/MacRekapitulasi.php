<?php

namespace App\Filament\Pages;

use App\Exports\MacRekapitulasiExport;
use App\Models\MacPrepayment;
use App\Models\MacReimbust;
use Filament\Actions\Action;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Pages\Page;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Maatwebsite\Excel\Excel;

class MacRekapitulasi extends Page implements HasTable, HasForms
{   
    use InteractsWithTable;
    use InteractsWithForms;
    
    protected string $view = 'filament.pages.mac-rekapitulasi';
    protected static bool $shouldRegisterNavigation = false;
    protected static ?string $navigationLabel = 'Rekapitulasi MAC';
    protected static ?string $title = 'Data Rekapitulasi MAC';

    
    public string $activeTab = 'pelaporan';
    public ?array $data = [];
     // Snapshot filter yang SUDAH diterapkan; ini yang dipakai tabel, total, dan export
    public array $range = ['awal' => null, 'akhir' => null];

    public array $totals = [];

    public function mount(): void {
        $this->form->fill();
        $this->loadTotals();
    }

     public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Grid::make(['default' => 1, 'sm' => 2])->schema([
                    DatePicker::make('tgl_awal')
                        ->label('Tanggal Awal')
                        ->native(false)
                        ->displayFormat('d M Y')
                        ->requiredWith('tgl_akhir'),
                    DatePicker::make('tgl_akhir')
                        ->label('Tanggal Akhir')
                        ->native(false)
                        ->displayFormat('d M Y')
                        ->requiredWith('tgl_awal')
                        ->afterOrEqual('tgl_awal'),
                ]),
            ])
            ->statePath('data');
    }

    protected function getHeaderActions(): array
    {
        return [
            Action::make('export')
                ->label('Export Excel')
                ->icon('heroicon-o-arrow-down-tray')
                ->color('success')
                ->action(fn () => $this->exportExcel()),
        ];
    }

    public function switchTab(string $tab): void
    {
        $this->activeTab = $tab;
        $this->resetTable();
    }

    public function filterData(): void
    {
        $state = $this->form->getState(); // validasi jalan di sini, bukan di table()

        $this->range = [
            'awal'  => $state['tgl_awal'] ?? null,
            'akhir' => $state['tgl_akhir'] ?? null,
        ];

        $this->loadTotals();
        $this->resetTable();
    }

    public function resetFilter(): void
    {
        $this->form->fill();
        $this->range = ['awal' => null, 'akhir' => null];

        $this->loadTotals();
        $this->resetTable();
    }

    public function loadTotals(): void
    {
        $this->totals =  MacReimbust::getTotalPengeluaran(
            $this->range['awal'],
            $this->range['akhir']
        );
    }

    protected function getBaseQuery(?string $tab = null): Builder
    {
        $targetTab = $tab ?? $this->activeTab;

        if ($targetTab === 'pelaporan') {
            $dateColumn = 'mac_prepayment.tgl_prepayment';

            $query = MacPrepayment::query()
                ->select([
                    'mac_prepayment.id',
                    'mac_prepayment.kode_prepayment',
                    'mac_reimbust.kode_reimbust',
                    'tbl_data_user.name',
                    'mac_prepayment.tujuan',
                    'mac_prepayment.tgl_prepayment as tgl_pengajuan',
                    'mac_prepayment.total_nominal',
                ])
                ->leftJoin('mac_reimbust', 'mac_reimbust.kode_prepayment', '=', 'mac_prepayment.kode_prepayment')
                ->leftJoin('tbl_data_user', 'mac_prepayment.id_user', '=', 'tbl_data_user.id_user')
                ->where('mac_prepayment.payment_status', 'paid')
                ->where('mac_prepayment.status', 'approved');
        } else {
            $dateColumn = 'mac_reimbust.tgl_pengajuan';

            $query = MacReimbust::query()
                ->select([
                    'mac_reimbust.id',
                    'mac_reimbust.kode_prepayment',
                    'mac_reimbust.kode_reimbust',
                    'tbl_data_user.name',
                    'mac_reimbust.tujuan',
                    'mac_reimbust.tgl_pengajuan',
                ])
                ->leftJoin('tbl_data_user', 'mac_reimbust.id_user', '=', 'tbl_data_user.id_user')
                ->where('mac_reimbust.payment_status', 'paid')
                ->where('mac_reimbust.status', 'approved')
                ->where('mac_reimbust.kode_prepayment', '');
        }

        return $query
            ->when($this->range['awal'], fn ($q, $v) => $q->whereDate($dateColumn, '>=', $v))
            ->when($this->range['akhir'], fn ($q, $v) => $q->whereDate($dateColumn, '<=', $v))
            ->orderByDesc($dateColumn);
    }

     public function table(Table $table): Table
    {
        $searchName = fn (Builder $q, string $s) => $q->where('tbl_data_user.name', 'like', "%{$s}%");

        if ($this->activeTab === 'pelaporan') {
            $columns = [
                TextColumn::make('kode_prepayment')->label('Kode Prepayment')->searchable(),
                TextColumn::make('kode_reimbust')->label('Kode Reimbust')
                 ->formatStateUsing(fn ($state) => strtoupper($state))
                 ->placeholder('-')
                    ->searchable(query: fn (Builder $q, string $s) => $q->where('pu_reimbust.kode_reimbust', 'like', "%{$s}%")),
                TextColumn::make('name')->label('Nama')->searchable(query: $searchName),
                TextColumn::make('tujuan')->label('Keterangan')->searchable(),
                TextColumn::make('tgl_pengajuan')->label('Tanggal')->date('d F Y'),
                TextColumn::make('total_nominal')->label('Pengeluaran')->money('IDR', locale: 'id'),
            ];
        } else {
            $columns = [
                TextColumn::make('kode_prepayment')->label('Kode Prepayment')->placeholder('-')->searchable(),
                TextColumn::make('kode_reimbust')->label('Kode Reimbust')
                    ->formatStateUsing(fn ($state) => strtoupper($state))->searchable(),
                TextColumn::make('name')->label('Nama')->searchable(query: $searchName),
                TextColumn::make('tujuan')->label('Keterangan')->searchable(),
                TextColumn::make('tgl_pengajuan')->label('Tanggal')->date('d F Y'),
            ];
        }

        return $table
            ->query($this->getBaseQuery())
            ->columns($columns);
    }

    public function exportExcel()
    {
        $pelaporan = $this->getBaseQuery('pelaporan')->get();
        $reimbust  = $this->getBaseQuery('reimbust')->get();

        $suffix = ($this->range['awal'] && $this->range['akhir'])
            ? "{$this->range['awal']}_sd_{$this->range['akhir']}"
            : now()->format('Ymd_His');

        return Excel::download(
            new MacRekapitulasiExport($pelaporan, $reimbust),
            "rekap-mac-{$suffix}.xlsx"
        );
    }
}
