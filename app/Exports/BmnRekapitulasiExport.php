<?php

namespace App\Exports;

use App\Exports\QbgRekapitulasiSheet;
use App\Exports\BmnRekapitulasiSheet;
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
            new BmnRekapitulasiSheet($this->pelaporan, 'pelaporan'),
            new BmnRekapitulasiSheet($this->reimbust, 'reimbust'),
        ];
    }
}