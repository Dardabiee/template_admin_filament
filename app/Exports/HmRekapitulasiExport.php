<?php

namespace App\Exports;


use App\Exports\HmRekapitulasiSheet;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\Export; 
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class HmRekapitulasiExport implements Export, WithMultipleSheets
{
    public function __construct(
        protected Collection $pelaporan,
        protected Collection $reimbust,
    ) {}

    public function sheets(): array
    {
        return [
            new HmRekapitulasiSheet($this->pelaporan, 'pelaporan'),
            new HmRekapitulasiSheet($this->reimbust, 'reimbust'),
        ];
    }
}