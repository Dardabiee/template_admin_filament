<?php

namespace App\Exports;


use App\Exports\MacRekapitulasiSheet;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\Export; 
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class MacRekapitulasiExport implements Export, WithMultipleSheets
{
    public function __construct(
        protected Collection $pelaporan,
        protected Collection $reimbust,
    ) {}

    public function sheets(): array
    {
        return [
            new MacRekapitulasiSheet($this->pelaporan, 'pelaporan'),
            new MacRekapitulasiSheet($this->reimbust, 'reimbust'),
        ];
    }
}