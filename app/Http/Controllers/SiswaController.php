<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Siswa;
use App\Models\Spp;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Siswa::query();

        if (isset($request->search)) {
            $search = $request->search;

            $query->where('nisn', 'like', "%{$search}%")
                ->orWhere('nis', 'like', "%{$search}%")
                ->orWhere('nama', 'like', "%{$search}%");
        }

        $siswas = $query->with('spp', 'kelas')->paginate(10);

        return view('dashboard.siswa.index', ['siswas' => $siswas]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kelass = Kelas::all();
        $spps = Spp::all();

        return view('dashboard.siswa.create', [
            'kelass' => $kelass,
            'spps' => $spps,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nisn' => 'required|numeric|unique:siswas,nisn',
            'nis' => 'required|numeric|unique:siswas,nis',
            'nama' => 'required|string',
            'id_kelas' => 'required|exists:kelas,id_kelas',
            'id_spp' => 'required|exists:spps,id_spp',
            'no_telp' => 'required|string|max:15',
            'alamat' => 'required|string',
        ]);

        Siswa::create($request->all());
        sweetalert('data berhasil dibuat');

        return redirect()->route('data-siswa');
    }

    /**
     * Display the specified resource.
     */
    public function show(Siswa $siswa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Siswa $id)
    {
        $kelass = Kelas::all();
        $spps = Spp::all();

        return view('dashboard.siswa.edit', [
            'siswa' => $id,
            'kelass' => $kelass,
            'spps' => $spps,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Siswa $siswa)
    {
        $request->validate([
            'nisn' => 'required|numeric|unique:siswas,nisn,'.$siswa->nisn.',nisn',
            'nis' => 'required|numeric|unique:siswas,nis,'.$siswa->nisn.',nisn',
            'nama' => 'required|string',
            'id_kelas' => 'required|exists:kelas,id_kelas',
            'id_spp' => 'required|exists:spps,id_spp',
            'no_telp' => 'required|string|max:15',
            'alamat' => 'required|string',
        ]);

        $siswa->update($request->all());

        sweetalert('Data berhasil di ubah');

        return redirect()->route('data-siswa');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Siswa $id)
    {
        $id->delete();

        sweetalert('data berhasil di hapus');

        return redirect()->route('data-siswa');
    }
}
