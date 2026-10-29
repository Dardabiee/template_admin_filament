<?php

namespace App\Exports;

use App\Exports\PuRekapitulasiSheet;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Maatwebsite\Excel\Concerns\Export; 

class PuRekapitulasiExport implements Export, WithMultipleSheets
{
    public function __construct(
        protected Collection $pelaporan,
        protected Collection $reimbust,
    ) {}

    public function sheets(): array
    {
        return [
            new PuRekapitulasiSheet($this->pelaporan, 'pelaporan'),
            new PuRekapitulasiSheet($this->reimbust, 'reimbust'),
        ];
    }
}