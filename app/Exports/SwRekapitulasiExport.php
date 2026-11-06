<?php

namespace App\Exports;

use App\Exports\QbgRekapitulasiSheet;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Maatwebsite\Excel\Concerns\Export; 

class SwRekapitulasiExport implements Export, WithMultipleSheets
{
    public function __construct(
        protected Collection $pelaporan,
        protected Collection $reimbust,
    ) {}

    public function sheets(): array
    {
        return [
            new QbgRekapitulasiSheet($this->pelaporan, 'pelaporan'),
            new QbgRekapitulasiSheet($this->reimbust, 'reimbust'),
        ];
    }
}