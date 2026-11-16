<?php

namespace App\Exports;

use App\Exports\SmlRekapitulasiSheet;
use App\Exports\SmlRekapitulasiSheet;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\Export; 
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class SmlRekapitulasiExport implements Export, WithMultipleSheets
{
    public function __construct(
        protected Collection $pelaporan,
        protected Collection $reimbust,
    ) {}

    public function sheets(): array
    {
        return [
            new SmlRekapitulasiSheet($this->pelaporan, 'pelaporan'),
            new SmlRekapitulasiSheet($this->reimbust, 'reimbust'),
        ];
    }
}