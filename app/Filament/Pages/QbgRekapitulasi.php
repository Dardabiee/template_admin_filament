<?php

namespace App\Filament\Pages;

use App\Exports\QbgRekapitulasiExport;
use App\Models\QbgPrepayment;
use App\Models\QbgReimbust;
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
use Maatwebsite\Excel\Facades\Excel;

class QbgRekapitulasi extends Page implements HasTable, HasForms
{   
    use InteractsWithTable;
    use InteractsWithForms;

    protected static bool $shouldRegisterNavigation = false;
    protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-document-chart-bar';
    protected string $view = 'filament.pages.qbg-rekapitulasi';
    protected static ?string $navigationLabel = 'Rekapitulasi QBG';
    protected static ?string $title = 'Data Rekapitulasi QBG';

    public string $activeTab = 'pelaporan';

    public ?array $data = [];
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
        $this->totals = QbgReimbust::getTotalPengeluaran(
            $this->range['awal'],
            $this->range['akhir']
        );
    }

    protected function getBaseQuery(): Builder
    {
        if ($this->activeTab === 'pelaporan') {
            $dateColumn = 'qbg_prepayment.tgl_prepayment';

            $query = QbgPrepayment::query()
                ->select([
                    'qbg_prepayment.id',
                    'qbg_prepayment.kode_prepayment',
                    'qbg_reimbust.kode_reimbust',
                    'tbl_data_user.name',
                    'qbg_prepayment.tujuan',
                    'qbg_prepayment.tgl_prepayment as tgl_pengajuan',
                    'qbg_prepayment.total_nominal',
                ])
                ->leftJoin('qbg_reimbust', 'qbg_reimbust.kode_prepayment', '=', 'qbg_prepayment.kode_prepayment')
                ->leftJoin('tbl_data_user', 'qbg_prepayment.id_user', '=', 'tbl_data_user.id_user')
                ->where('qbg_prepayment.payment_status', 'paid')
                ->where('qbg_prepayment.status', 'approved');
        } else {
            $dateColumn = 'qbg_reimbust.tgl_pengajuan';

            $query = QbgReimbust::query()
                ->select([
                    'qbg_reimbust.id',
                    'qbg_reimbust.kode_prepayment',
                    'qbg_reimbust.kode_reimbust',
                    'tbl_data_user.name',
                    'qbg_reimbust.tujuan',
                    'qbg_reimbust.tgl_pengajuan',
                ])
                ->leftJoin('tbl_data_user', 'qbg_reimbust.id_user', '=', 'tbl_data_user.id_user')
                ->where('qbg_reimbust.payment_status', 'paid')
                ->where('qbg_reimbust.status', 'approved')
                ->where('qbg_reimbust.kode_prepayment', '');
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
                TextColumn::make('kode_reimbust')->label('Kode Reimbust')->placeholder('-')
                    ->formatStateUsing(fn ($state) => strtoupper($state))
                    ->searchable(query: fn (Builder $q, string $s) => $q->where('kps_reimbust.kode_reimbust', 'like', "%{$s}%")),
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
            ->query($this->getBaseQuery($this->activeTab))
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
            new QbgRekapitulasiExport($pelaporan, $reimbust),
            "rekap-kps-{$suffix}.xlsx"
        );
    }
}
