<?php

namespace App\Exports;

use Carbon\Carbon;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithTitle;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class KpsRekapitulasiSheet implements
    FromCollection, WithHeadings, WithMapping, WithTitle,
    WithStyles, WithColumnFormatting, ShouldAutoSize
{
    protected int $no = 0;

    public function __construct(
        protected Collection $rows,
        protected string $tab,
        // protected array $range = [],
    ) {}

    public function collection(): Collection
    {
        return $this->rows;
    }

    public function title(): string
    {
        return $this->tab === 'pelaporan' ? 'Pelaporan' : 'Reimbust';
    }

    public function headings(): array
    {
        $base = ['No', 'Kode Prepayment', 'Kode Reimbust', 'Nama', 'Keterangan', 'Tanggal'];

        return $this->tab === 'pelaporan' ? [...$base, 'Pengeluaran'] : $base;
    }

    public function map($row): array
    {
        $this->no++;

        $data = [
            $this->no,
            $row->kode_prepayment ?: '-',
            $row->kode_reimbust ? strtoupper($row->kode_reimbust) : '-',
            $row->name,
            $row->tujuan,
            // Simpan sebagai serial date Excel biar bisa difilter/sort sebagai tanggal asli
            $row->tgl_pengajuan ? Date::dateTimeToExcel(Carbon::parse($row->tgl_pengajuan)) : null,
        ];

        if ($this->tab === 'pelaporan') {
            $data[] = (float) $row->total_nominal; // angka asli, bukan string "Rp ..."
        }

        return $data;
    }

    public function columnFormats(): array
    {
        $formats = ['F' => 'dd/mm/yyyy'];

        if ($this->tab === 'pelaporan') {
            $formats['G'] = '#,##0';
        }

        return $formats;
    }

    public function styles(Worksheet $sheet): array
    {
        return [
            1 => [
                'font' => ['bold' => true],
                'fill' => [
                    'fillType'   => 'solid',
                    'startColor' => ['rgb' => 'E5E7EB'],
                ],
            ],
        ];
    }
}