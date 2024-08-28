<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class LaporanSppExport implements WithMultipleSheets
{
    use Exportable;

    protected $kelasList;

    protected $bulan;

    protected $tahun;

    protected $belums;

    public function __construct($kelasList, $bulan, $tahun, $belums)
    {
        $this->kelasList = $kelasList;
        $this->bulan = $bulan;
        $this->tahun = $tahun;
        $this->belums = $belums;
    }

    public function sheets(): array
    {
        $sheets = [];

        foreach ($this->kelasList as $kelas) {
            $sheets[] = new SppExport($kelas, $this->bulan, $this->tahun, $this->belums->get($kelas));
        }

        return $sheets;
    }
}
