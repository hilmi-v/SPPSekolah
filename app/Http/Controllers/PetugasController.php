<?php

namespace App\Http\Controllers;

use App\Models\Petugas;
use Illuminate\Http\Request;

class PetugasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $petugass = Petugas::paginate(10);

        return view('dashboard.petugas.index', ['petugass' => $petugass]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.petugas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'username' => 'required|unique:petugas,username',
            'password' => 'required',
            'nama_petugas' => 'required',
            'level' => 'required',
        ]);

        Petugas::create($request->all());

        SweetAlert('data berhasil dibuat');

        return redirect()->route('data-petugas');
    }

    /**
     * Display the specified resource.
     */
    public function show(Petugas $petugas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Petugas $id)
    {
        return view('dashboard.petugas.edit', ['petugas' => $id]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'username' => "required|unique:petugas,username,{$id},id_petugas",
            'nama_petugas' => 'required',
            'level' => 'required',
        ]);

        Petugas::findOrFail($id)->update($request->all());

        SweetAlert('data berhasil di ubah');

        return redirect()->route('data-petugas');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Petugas::where('id_petugas', $id)->delete();

        SweetAlert('data berhasil hapus');

        return redirect()->route('data-petugas');
    }
}
