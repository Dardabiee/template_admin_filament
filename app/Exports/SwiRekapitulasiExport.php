<?php

namespace App\Exports;

use App\Exports\QbgRekapitulasiSheet;
use App\Exports\SwiRekapitulasiSheet;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\Export; 
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class SwiRekapitulasiExport implements Export, WithMultipleSheets
{
    public function __construct(
        protected Collection $pelaporan,
        protected Collection $reimbust,
    ) {}

    public function sheets(): array
    {
        return [
            new SwiRekapitulasiSheet($this->pelaporan, 'pelaporan'),
            new SwiRekapitulasiSheet($this->reimbust, 'reimbust'),
        ];
    }
}