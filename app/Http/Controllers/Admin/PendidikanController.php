<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pendidikan;
use Illuminate\Http\Request;

class PendidikanController extends Controller
{
    public function index() {
        $pendidikan = Pendidikan::all(); //ambil semua data di database melalui model
        return view('admin.pages.pendidikan.index', compact('pendidikan')); //compact agar data bisa ditampilkan dihalaman
    }

    //method halaman create 
    public function create() {
        return view('admin.pages.pendidikan.create');
    }

    //method fungsi tambah data
    public function store(Request $request) {
        // dd($request->all());
        $validated = $request->validate([
            'jenjang_pendidikan' => ['sometimes', 'required'],
        ]); //validasi field jika ada direquest dan agar diisi

        $created = Pendidikan::create($validated); //buat data sesuai request dari $validated
        if ($created) {
            return redirect()->route('admin.pendidikan.index')->with('success', 'Data berhasil disimpan.');
        }
        return redirect()->route('admin.pendidikan.index')->with('error', 'Data gagal disimpan.');
    }

    //method halaman edit
    public function edit(Request $request,$id) {
        $pendidikan = Pendidikan::findOrFail($id); //ambil data berdasarkan id dari halaman edit

        return view('admin.pages.pendidikan.edit', compact('pendidikan'));
    }

    //method fungsi edit data
    public function update(Request $request,$id) {
        // dd($request->all());
        $pendidikan = Pendidikan::findOrFail($id);

        $validated = $request->validate([
            'jenjang_pendidikan' => ['sometimes', 'required'],
        ]);
        
        $pendidikan->update($validated); //perbarui data sesuai request dari $validated
        if ($pendidikan) {
            return redirect()->route('admin.pendidikan.index')->with('success', 'Data berhasil disimpan.');
        }
        return redirect()->route('admin.pendidikan.index')->with('error', 'Data gagal disimpan.');
    }

    //method fungsi hapus data
    public function destroy($id) {
        $pendidikan = Pendidikan::findOrFail($id);

        //kondisi untuk hapus data
        if ($pendidikan) {
            $pendidikan->delete(); //hapus data, jika $pendidikan ada
            return redirect()->route('admin.pendidikan.index')->with('success', 'Data berhasil disimpan.');
        }
        return redirect()->route('admin.pendidikan.index')->with('error', 'Data gagal disimpan.');
    }
}
