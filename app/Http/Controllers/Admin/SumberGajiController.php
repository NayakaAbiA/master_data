<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SumberGaji;
use Illuminate\Http\Request;

class SumberGajiController extends Controller
{
    public function index() {
        $sumbergaji = SumberGaji::all(); //ambil semua data di database melalui model
        return view('admin.pages.sumber_gaji.index', compact('sumbergaji')); //compact agar data bisa ditampilkan dihalaman
    }

    //method halaman create 
    public function create() {
        return view('admin.pages.sumber_gaji.create');
    }

    //method fungsi tambah data
    public function store(Request $request) {
        // dd($request->all());
        $validated = $request->validate([
            'sumber_gaji' => ['sometimes', 'required'],
        ]); //validasi field jika ada direquest dan agar diisi

        $created = SumberGaji::create($validated); //buat data sesuai request dari $validated
        if ($created) {
            return redirect()->route('admin.sumbergaji.index')->with('success', 'Data berhasil disimpan.');
        }
        return redirect()->route('admin.sumbergaji.index')->with('error', 'Data gagal disimpan.');
    }

    //method halaman edit
    public function edit(Request $request,$id) {
        $sumbergaji = SumberGaji::findOrFail($id); //ambil data berdasarkan id dari halaman edit

        return view('admin.pages.sumber_gaji.edit', compact('sumbergaji'));
    }

    //method fungsi edit data
    public function update(Request $request,$id) {
        // dd($request->all());
        $sumbergaji = SumberGaji::findOrFail($id);

        $validated = $request->validate([
            'sumber_gaji' => ['sometimes', 'required'],
        ]);
        
        $sumbergaji->update($validated); //perbarui data sesuai request dari $validated
        if ($sumbergaji) {
            return redirect()->route('admin.sumbergaji.index')->with('success', 'Data berhasil disimpan.');
        }
        return redirect()->route('admin.sumbergaji.index')->with('error', 'Data gagal disimpan.');
    }

    //method fungsi hapus data
    public function destroy($id) {
        $sumbergaji = sumbergaji::findOrFail($id);

        //kondisi untuk hapus data
        if ($sumbergaji) {
            $sumbergaji->delete(); //hapus data, jika $sumbergaji ada
            return redirect()->route('admin.sumbergaji.index')->with('success', 'Data berhasil disimpan.');
        }
        return redirect()->route('admin.sumbergaji.index')->with('error', 'Data gagal disimpan.');
    }
}
