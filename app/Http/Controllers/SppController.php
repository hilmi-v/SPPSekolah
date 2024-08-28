<?php

namespace App\Http\Controllers;

use App\Models\Spp;
use Illuminate\Http\Request;

class SppController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $spps = Spp::paginate(5);

        return view('dashboard.spp.index', [
            'spps' => $spps,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.spp.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'tahun' => 'required|numeric',
            'nominal' => 'required|numeric',
        ]);

        spp::create($request->all());

        sweetalert('Data berhasil dibuat');

        return redirect()->route('data-spp');
    }

    /**
     * Display the specified resource.
     */
    public function show(Spp $spp)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Spp $id)
    {

        return view('dashboard.spp.edit', ['spp' => $id]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'tahun' => 'required|numeric',
            'nominal' => 'required|numeric',
        ]);

        spp::findOrFail($id)->update($request->all());

        sweetalert('Data berhasil diubah');

        return redirect()->route('data-spp');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Spp::where('id_spp', $id)->delete();

        sweetalert('Data berhasil dihapus');

        return redirect()->route('data-spp');
    }
}
