<?php

namespace App\Exports;

use App\Exports\KpsRekapitulasiSheet;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Maatwebsite\Excel\Concerns\Export; 

class KpsRekapitulasiExport implements Export, WithMultipleSheets
{
    public function __construct(
        protected Collection $pelaporan,
        protected Collection $reimbust,
    ) {}

    public function sheets(): array
    {
        return [
            new KpsRekapitulasiSheet($this->pelaporan, 'pelaporan'),
            new KpsRekapitulasiSheet($this->reimbust, 'reimbust'),
        ];
    }
}