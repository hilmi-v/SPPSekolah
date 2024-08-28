<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Validation\Rule;

class PembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.pembayaran');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {

        $data = Siswa::with('kelas', 'spp')->where('nisn', $request->nisn)->first();

        if ($data) {
            return view('dashboard.pembayaran-create', ['data' => $data]);
        } else {
            sweetalert()->error('data murid tidak ada atau salah');

            return redirect()->route('pembayaran');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nisn' => 'required|exists:siswas,nisn',
            'tahun_dibayar' => 'required|numeric',
            'bulan_dibayar' => [
                'required',
                'string',
                Rule::unique('pembayarans')->where(function ($query) use ($request) {
                    return $query->where('nisn', $request->nisn)
                        ->where('tahun_dibayar', $request->tahun_dibayar)
                        ->where('bulan_dibayar', $request->bulan_dibayar);
                }),
            ],
            'jumlah_bayar' => 'required|numeric',
        ], [
            'bulan_dibayar.unique' => 'Pembayaran untuk bulan ini sudah dilakukan.',
        ]);

        $data = Siswa::with('kelas', 'spp')->where('nisn', $request->nisn)->first();

        Pembayaran::create([
            'id_petugas' => 1,
            'nisn' => $data->nisn,
            'id_spp' => $data->spp->id_spp,
            'tgl_bayar' => now(),
            'bulan_dibayar' => $request->bulan_dibayar,
            'tahun_dibayar' => $request->tahun_dibayar,
            'jumlah_bayar' => $request->jumlah_bayar,
        ]);

        SweetAlert('Transaksi Berhasil');

        return redirect()->route('history');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pembayaran $pembayaran)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pembayaran $id)
    {
        return view('dashboard.pembayaran-edit', ['pembayaran' => $id]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pembayaran $id)
    {
        $request->validate([
            'tahun_dibayar' => 'required|numeric',
            'bulan_dibayar' => [
                'required',
                'string',
                Rule::unique('pembayarans')->where(function ($query) use ($request, $id) {
                    return $query->where('nisn', $id->nisn)
                        ->where('tahun_dibayar', $request->tahun_dibayar)
                        ->where('bulan_dibayar', $request->bulan_dibayar)
                        ->where('id_pembayaran', '!=', $id->id_pembayaran);
                }),
            ],
            'jumlah_bayar' => 'required|numeric',
        ], [
            'bulan_dibayar.unique' => 'Pembayaran untuk bulan ini sudah dilakukan.',
        ]);

        $id->update($request->all());

        SweetAlert('Transaksi Berhasil diubah');

        return redirect()->route('history');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pembayaran $id)
    {
        $id->delete();

        SweetAlert('Transaksi Berhasil dihapus');

        return redirect()->route('history');
    }
}
