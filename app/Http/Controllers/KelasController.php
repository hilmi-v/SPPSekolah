<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kelass = Kelas::paginate(10);

        return view('dashboard.kelas.index', ['kelass' => $kelass]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.kelas.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_kelas' => 'required|unique:kelas,nama_kelas',
            'kompetensi_keahlian' => 'required',
        ]);

        Kelas::create([
            'nama_kelas' => $request->nama_kelas,
            'kompetensi_keahlian' => $request->kompetensi_keahlian,
        ]);
        sweetalert('Data berhasil dibuat');

        return redirect()->route('data-kelas');
    }

    /**
     * Display the specified resource.
     */
    public function show(Kelas $kelas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kelas $kelas)
    {
        return view('dashboard.kelas.edit', ['kelas' => $kelas]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kelas $id)
    {
        $request->validate([
            'nama_kelas' => "required|unique:kelas,nama_kelas,{$id->nama_kelas},nama_kelas",
            'kompetensi_keahlian' => 'required',
        ]);

        $id->update($request->all());

        sweetalert('Data berhasil di Update');

        return redirect()->route('data-kelas');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        Kelas::where('id_kelas', $id)->delete();

        sweetalert('Data berhasil dihapus');

        return redirect()->route('data-kelas');

    }
}
