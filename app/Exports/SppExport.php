<?php

namespace App\Exports;

use App\Models\Pembayaran;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class SppExport implements FromView, ShouldAutoSize
{
    protected $kelas;

    protected $bulan;

    protected $tahun;

    protected $belums;

    public function __construct($kelas, $bulan, $tahun, $belums)
    {
        $this->kelas = $kelas;
        $this->bulan = $bulan;
        $this->tahun = $tahun;
        $this->belums = $belums;
    }

    public function view(): View
    {
        $pembayarans = Pembayaran::with(['siswa', 'siswa.kelas', 'spp'])
            ->where('bulan_dibayar', $this->bulan)
            ->where('tahun_dibayar', $this->tahun)
            ->whereHas('siswa.kelas', function ($query) {
                $query->where('nama_kelas', $this->kelas);
            })
            ->get()
            ->sortBy('siswa.nama', SORT_NATURAL);

        return view('excel-download', [
            'pembayarans' => $pembayarans,
            'kelas' => $this->kelas,
            'belums' => $this->belums,
            'bulan' => $this->bulan,
            'tahun' => $this->tahun,
        ]);
    }
}
