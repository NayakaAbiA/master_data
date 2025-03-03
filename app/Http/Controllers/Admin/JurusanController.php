<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Jurusan;
use App\Models\Pegawai;
use Illuminate\Http\Request;

class JurusanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jurusan = Jurusan::with('pegawai')->get();
        return view('Admin.pages.jurusan.index', compact('jurusan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $ptk = Pegawai::all();
        return view('Admin.pages.jurusan.create', compact('ptk'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_jur' => ['sometimes', 'required'],
            'id_ptk_kakom' => ['sometimes', 'required'],
        ]); //validasi field jika ada direquest dan agar diisi

        $created = Jurusan::create($validated); //buat data sesuai request dari $validated
        if ($created) {
            return redirect()->route('admin.jurusan.index')->with('success', 'Data berhasil disimpan.');
        }
        return redirect()->route('admin.jurusan.index')->with('error', 'Data gagal disimpan.');
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
           'jurusan' => Jurusan::findOrFail($id), //ambil data berdasarkan id dari halaman edit
           'ptk' => Pegawai::get(), //ambil data Pegawai
        ];
        return view('Admin.pages.jurusan.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $jurusan = Jurusan::findOrFail($id);

        $validated = $request->validate([
            'nama_jur' => ['sometimes', 'required'],
            'id_ptk_kakom' => ['sometimes', 'required'],
        ]);

        $jurusan->update($validated); //perbarui data sesuai request dari $validated
        if ($jurusan) {
            return redirect()->route('admin.jurusan.index')->with('success', 'Data berhasil disimpan.');
        }
        return redirect()->route('admin.jurusan.index')->with('error', 'Data gagal disimpan.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $jurusan = jurusan::findOrFail($id);

        //kondisi untuk hapus data
        if ($jurusan) {
            $jurusan->delete(); //hapus data, jika $jurusan ada
            return redirect()->route('admin.jurusan.index')->with('success', 'Data berhasil di delete.');
        }
        return redirect()->route('admin.jurusan.index')->with('error', 'Data gagal disimpan.');
    }
}
