<?php

namespace App\Exports;

use App\Exports\CtzRekapitulasiSheet;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\Export; 
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class BmnRekapitulasiExport implements Export, WithMultipleSheets
{
    public function __construct(
        protected Collection $pelaporan,
        protected Collection $reimbust,
    ) {}

    public function sheets(): array
    {
        return [
            new CtzRekapitulasiSheet($this->pelaporan, 'pelaporan'),
            new CtzRekapitulasiSheet($this->reimbust, 'reimbust'),
        ];
    }
}