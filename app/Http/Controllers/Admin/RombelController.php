<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pegawai;
use App\Models\Rombel;
use Illuminate\Http\Request;

class RombelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rombel = Rombel::with('walas')->get();
        return view('Admin.pages.rombel.index', compact('rombel'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $ptk_walas = Pegawai::all();
        return view('Admin.pages.rombel.create', compact('ptk_walas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_rombel' => ['sometimes', 'required'],
            'id_ptk_walas' => ['sometimes', 'required'],
        ]); //validasi field jika ada direquest dan agar diisi

        $created = Rombel::create($validated); //buat data sesuai request dari $validated
        if ($created) {
            return redirect()->route('admin.rombel.index')->with('success', 'Data berhasil disimpan.');
        }
        return redirect()->route('admin.rombel.index')->with('error', 'Data gagal disimpan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = [
            'ptk_walas'=> Pegawai::all(),
            'rombel' => Rombel::findOrFail($id)
        ];
        return view('Admin.pages.rombel.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
         $rombel = Rombel::findOrFail($id);

        $validated = $request->validate([
            'nama_rombel' => ['sometimes', 'required'],
            'id_ptk_walas' => ['sometimes', 'required'],
        ]);

        $rombel->update($validated); //perbarui data sesuai request dari $validated
        if ($rombel) {
            return redirect()->route('admin.rombel.index')->with('success', 'Data berhasil disimpan.');
        }
        return redirect()->route('admin.rombel.index')->with('error', 'Data gagal disimpan.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $rombel = Rombel::findOrFail($id);

        //kondisi untuk hapus data
        if ($rombel) {
            $rombel->delete(); //hapus data, jika $rombel ada
            return redirect()->route('admin.rombel.index')->with('success', 'Data berhasil disimpan.');
        }
        return redirect()->route('admin.rombel.index')->with('error', 'Data gagal disimpan.');
    }
}
