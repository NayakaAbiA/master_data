<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Agama;
use Illuminate\Http\Request;

class AgamaController extends Controller
{
    public function index() {
        $agama = Agama::all(); //ambil semua data di database melalui model
        return view('admin.pages.agama.index', compact('agama')); //compact agar data bisa ditampilkan dihalaman
    }

    //method halaman create 
    public function create() {
        return view('admin.pages.agama.create');
    }

    //method fungsi tambah data
    public function store(Request $request) {
        // dd($request->all());
        $validated = $request->validate([
            'nama_agama' => ['sometimes', 'required', 'string', 'max:255', 'unique:tb_agama,nama_agama'],
        ]); //validasi field jika ada direquest dan agar diisi

        $created = Agama::create($validated); //buat data sesuai request dari $validated
        if ($created) {
            return redirect()->route('admin.agama.index')->with('success', 'Data berhasil disimpan.');
        }
        return redirect()->route('admin.agama.index')->with('error', 'Data gagal disimpan.');
    }

    //method halaman edit
    public function edit(Request $request,$id) {
        $agama = Agama::findOrFail($id); //ambil data berdasarkan id dari halaman edit

        return view('admin.pages.agama.edit', compact('agama'));
    }

    //method fungsi edit data
    public function update(Request $request,$id) {
        // dd($request->all());
        $agama = Agama::findOrFail($id);

        $validated = $request->validate([
            'nama_agama' => ['sometimes', 'required', 'string', 'max:255'],
        ]);
        
        $agama->update($validated); //perbarui data sesuai request dari $validated
        if ($agama) {
            return redirect()->route('admin.agama.index')->with('success', 'Data berhasil disimpan.');
        }
        return redirect()->route('admin.agama.index')->with('error', 'Data gagal disimpan.');
    }

    //method fungsi hapus data
    public function destroy($id) {
        $agama = Agama::findOrFail($id);

        //kondisi untuk hapus data
        if ($agama) {
            $agama->delete(); //hapus data, jika $agama ada
            return redirect()->route('admin.agama.index')->with('success', 'Data berhasil disimpan.');
        }
        return redirect()->route('admin.agama.index')->with('error', 'Data gagal disimpan.');
    }
}
