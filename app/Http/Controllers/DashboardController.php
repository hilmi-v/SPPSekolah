<?php

namespace App\Http\Controllers;

use App\Exports\LaporanSppExport;
use App\Models\kelas;
use App\Models\Pembayaran;
use App\Models\Petugas;
use App\Models\Siswa;
use App\Models\Spp;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Mpdf\Mpdf as Mpdf;

class DashboardController extends Controller
{
    public function index()
    {
        $totalSiswa = Siswa::count();
        $totalKelas = Kelas::count();
        $totalSpp = Spp::count();
        $totalPetugas = Petugas::count();
        $pembayarans = Pembayaran::with(['spp', 'petugas', 'siswa'])->paginate(5);

        return view('dashboard.index', [
            'totalSiswa' => $totalSiswa,
            'totalKelas' => $totalKelas,
            'totalSpp' => $totalSpp,
            'totalPetugas' => $totalPetugas,
            'pembayarans' => $pembayarans,
        ]);
    }

    public function history(Request $request)
    {

        $query = Pembayaran::query();
        if (isset($request->search)) {
            $search = $request->search;

            $query->where('nisn', 'like', "%{$search}%")
                ->orWhereHas('petugas', function (Builder $query) use ($search) {
                    $query->where('nama_petugas', 'like', "%{$search}%");
                })->orWhereHas('siswa', function (Builder $query) use ($search) {
                    $query->where('nama', 'like', "%{$search}%");
                });
        }

        $pembayarans = $query->with(['spp', 'petugas', 'siswa'])->latest()->paginate(5);

        return view('dashboard.history', [
            'pembayarans' => $pembayarans,
        ]);

    }

    public function laporan()
    {
        return view('dashboard.laporan');
    }

    public function printPdf(Request $request)
    {

        // validasi bulan dan tahun
        $request->validate([
            'bulan' => 'required',
            'tahun' => 'required',
        ]);

        $jumlahSiswa = Siswa::count();
        $kelasList = Kelas::pluck('nama_kelas')->toArray();

        // mengambil semua data pembayaran pada tahun dan bulan tersebut lalu diurutkan berdasarkan nama dan dikelompokan
        //berdasarkan kelas
        $pembayarans = Pembayaran::with(['siswa', 'siswa.kelas', 'spp'])
            ->where('bulan_dibayar', $request->bulan)
            ->where('tahun_dibayar', $request->tahun)

            ->get()
            ->sortBy(function ($payment) {
                return $payment->siswa->nama;
            })
            ->groupBy(function ($payment) {
                return $payment->siswa->kelas->nama_kelas;
            });

        // mencari siswa yang belum membayar atau kurang
        $siswas = Siswa::with(['pembayaran', 'kelas', 'spp'])->get();

        $pembayaranBelum = [];

        foreach ($siswas as $siswa) {
            $pembayaranBulan = $siswa->pembayaran
                ->where('bulan_dibayar', $request->bulan)
                ->where('tahun_dibayar', $request->tahun);

            if ($pembayaranBulan->isEmpty()) {
                $pembayaranBelum[] = $siswa;

            }

        }

        $pembayaranBelum = collect($pembayaranBelum)
            ->sortBy('nama')
            ->groupBy(function ($siswa) {
                return $siswa->kelas->nama_kelas;
            });

        $mpdf = new Mpdf();

        $mpdf->setFooter('{PAGENO}');

        $mpdf->WriteHTML(view('pdf-download', [
            'pembayarans' => $pembayarans,
            'bulan' => $request->bulan,
            'tahun' => $request->tahun,
            'belums' => $pembayaranBelum,
            'jumlahSiswa' => $jumlahSiswa,
            'kelasList' => $kelasList,
        ]));

        $mpdf->Output("Laporan-SPP-{$request->bulan}-{$request->tahun}.pdf", 'D');

    }

    public function printExcel(Request $request)
    {
        // Validasi bulan dan tahun
        $request->validate([
            'bulan' => 'required',
            'tahun' => 'required',
        ]);

        // Ambil daftar kelas
        $kelasList = Kelas::pluck('nama_kelas')->toArray();

        // Ambil semua siswa dan data pembayaran

        $siswas = Siswa::with(['pembayaran', 'kelas', 'spp'])->get();

        $pembayaranBelum = [];

        foreach ($siswas as $siswa) {
            $pembayaranBulan = $siswa->pembayaran
                ->where('bulan_dibayar', $request->bulan)
                ->where('tahun_dibayar', $request->tahun);

            if ($pembayaranBulan->isEmpty()) {
                $pembayaranBelum[] = $siswa;
            }
        }

        $pembayaranBelum = collect($pembayaranBelum)
            ->sortBy('nama')
            ->groupBy(function ($pembayaran) {
                return $pembayaran->kelas->nama_kelas;
            });

        return Excel::download(new LaporanSppExport($kelasList, $request->bulan, $request->tahun, $pembayaranBelum), "Laporan-SPP-{$request->bulan}-{$request->tahun}.xlsx");
    }
}
