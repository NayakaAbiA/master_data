<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pekerjaan;
use Illuminate\Http\Request;

class PekerjaanController extends Controller
{
    public function index() {
        $pekerjaan = Pekerjaan::all(); //ambil semua data di database melalui model
        return view('admin.pages.pekerjaan.index', compact('pekerjaan')); //compact agar data bisa ditampilkan dihalaman
    }

    //method halaman create 
    public function create() {
        return view('admin.pages.pekerjaan.create');
    }

    //method fungsi tambah data
    public function store(Request $request) {
        // dd($request->all());
        $validated = $request->validate([
            'pekerjaan' => ['sometimes', 'required'],
        ]); //validasi field jika ada direquest dan agar diisi

        $created = Pekerjaan::create($validated); //buat data sesuai request dari $validated
        if ($created) {
            return redirect()->route('admin.pekerjaan.index')->with('success', 'Data berhasil disimpan.');
        }
        return redirect()->route('admin.pekerjaan.index')->with('error', 'Data gagal disimpan.');
    }

    //method halaman edit
    public function edit(Request $request,$id) {
        $pekerjaan = Pekerjaan::findOrFail($id); //ambil data berdasarkan id dari halaman edit

        return view('admin.pages.pekerjaan.edit', compact('pekerjaan'));
    }

    //method fungsi edit data
    public function update(Request $request,$id) {
        // dd($request->all());
        $pekerjaan = Pekerjaan::findOrFail($id);

        $validated = $request->validate([
            'pekerjaan' => ['sometimes', 'required'],
        ]);
        
        $pekerjaan->update($validated); //perbarui data sesuai request dari $validated
        if ($pekerjaan) {
            return redirect()->route('admin.pekerjaan.index')->with('success', 'Data berhasil disimpan.');
        }
        return redirect()->route('admin.pekerjaan.index')->with('error', 'Data gagal disimpan.');
    }

    //method fungsi hapus data
    public function destroy($id) {
        $pekerjaan = Pekerjaan::findOrFail($id);

        //kondisi untuk hapus data
        if ($pekerjaan) {
            $pekerjaan->delete(); //hapus data, jika $pekerjaan ada
            return redirect()->route('admin.pekerjaan.index')->with('success', 'Data berhasil disimpan.');
        }
        return redirect()->route('admin.pekerjaan.index')->with('error', 'Data gagal disimpan.');
    }
}
