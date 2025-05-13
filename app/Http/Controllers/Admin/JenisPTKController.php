<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\JenisPTK;

class JenisPTKController extends Controller
{
    //method halaman index 
    public function index() {
        $jenisptk = JenisPTK::all(); //ambil semua data di database melalui model
        return view('admin.pages.jenis_ptk.index', compact('jenisptk')); //compact agar data bisa ditampilkan dihalaman
    }

    //method halaman create 
    public function create() {
        return view('admin.pages.jenis_ptk.create');
    }

    //method fungsi tambah data
    public function store(Request $request) {
        // dd($request->all());
        $validated = $request->validate([
            'jenis_ptk' => ['sometimes', 'required', 'string', 'max:25', 'unique:tb_jnsptk,jenis_ptk'],
        ]); //validasi field jika ada direquest dan agar diisi

        $created = JenisPTK::create($validated); //buat data sesuai request dari $validated
        if ($created) {
            return redirect()->route('admin.jenisptk.index')->with('success', 'Data berhasil disimpan.');
        }
        return redirect()->route('admin.jenisptk.index')->with('error', 'Data gagal disimpan.');
    }

    //method halaman edit
    public function edit(Request $request,$id) {
        $jenisptk = JenisPTK::findOrFail($id); //ambil data berdasarkan id dari halaman edit

        return view('admin.pages.jenis_ptk.edit', compact('jenisptk'));
    }

    //method fungsi edit data
    public function update(Request $request,$id) {
        // dd($request->all());
        $jenisptk = JenisPTK::findOrFail($id);

        $validated = $request->validate([
            'jenis_ptk' => ['sometimes', 'required', 'string', 'max:25'],
        ]);
        
        $jenisptk->update($validated); //perbarui data sesuai request dari $validated
        if ($jenisptk) {
            return redirect()->route('admin.jenisptk.index')->with('success', 'Data berhasil disimpan.');
        }
        return redirect()->route('admin.jenisptk.index')->with('error', 'Data gagal disimpan.');
    }

    //method fungsi hapus data
    public function destroy($id) {
        $jenisptk = JenisPTK::findOrFail($id);

        //kondisi untuk hapus data
        if ($jenisptk) {
            $jenisptk->delete(); //hapus data, jika $jenisptk ada
            return redirect()->route('admin.jenisptk.index')->with('success', 'Data berhasil disimpan.');
        }
        return redirect()->route('admin.jenisptk.index')->with('error', 'Data gagal disimpan.');
    }
}
