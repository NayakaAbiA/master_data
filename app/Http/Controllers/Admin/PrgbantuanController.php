<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Prgbantuan;
use Illuminate\Http\Request;

class PrgbantuanController extends Controller
{
    public function index() {
        $prgbantuan = Prgbantuan::all(); //ambil semua data di database melalui model
        return view('admin.pages.prgbantuan.index', compact('prgbantuan')); //compact agar data bisa ditampilkan dihalaman
    }

    //method halaman create 
    public function create() {
        return view('admin.pages.prgbantuan.create');
    }

    //method fungsi tambah data
    public function store(Request $request) {
        // dd($request->all());
        $validated = $request->validate([
            'prgbantuan' => ['sometimes', 'required'],
        ]); //validasi field jika ada direquest dan agar diisi

        $created = Prgbantuan::create($validated); //buat data sesuai request dari $validated
        if ($created) {
            return redirect()->route('admin.prgbantuan.index')->with('success', 'Data berhasil disimpan.');
        }
        return redirect()->route('admin.prgbantuan.index')->with('error', 'Data gagal disimpan.');
    }

    //method halaman edit
    public function edit(Request $request,$id) {
        $prgbantuan = Prgbantuan::findOrFail($id); //ambil data berdasarkan id dari halaman edit

        return view('admin.pages.prgbantuan.edit', compact('prgbantuan'));
    }

    //method fungsi edit data
    public function update(Request $request,$id) {
        // dd($request->all());
        $prgbantuan = Prgbantuan::findOrFail($id);

        $validated = $request->validate([
            'prgbantuan' => ['sometimes', 'required'],
        ]);
        
        $prgbantuan->update($validated); //perbarui data sesuai request dari $validated
        if ($prgbantuan) {
            return redirect()->route('admin.prgbantuan.index')->with('success', 'Data berhasil disimpan.');
        }
        return redirect()->route('admin.prgbantuan.index')->with('error', 'Data gagal disimpan.');
    }

    //method fungsi hapus data
    public function destroy($id) {
        $prgbantuan = Prgbantuan::findOrFail($id);

        //kondisi untuk hapus data
        if ($prgbantuan) {
            $prgbantuan->delete(); //hapus data, jika $prgbantuan ada
            return redirect()->route('admin.prgbantuan.index')->with('success', 'Data berhasil disimpan.');
        }
        return redirect()->route('admin.prgbantuan.index')->with('error', 'Data gagal disimpan.');
    }
}
