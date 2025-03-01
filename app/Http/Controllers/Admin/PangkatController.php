<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pangkat;
use Illuminate\Http\Request;

class PangkatController extends Controller
{
    public function index() {
        $pangkat = Pangkat::all(); //ambil semua data di database melalui model
        return view('admin.pages.pangkat.index', compact('pangkat')); //compact agar data bisa ditampilkan dihalaman
    }

    //method halaman create 
    public function create() {
        return view('admin.pages.pangkat.create');
    }

    //method fungsi tambah data
    public function store(Request $request) {
        // dd($request->all());
        $validated = $request->validate([
            'pangkat' => ['sometimes', 'required'],
        ]); //validasi field jika ada direquest dan agar diisi

        $created = pangkat::create($validated); //buat data sesuai request dari $validated
        if ($created) {
            return redirect()->route('admin.pangkat.index')->with('success', 'Data berhasil disimpan.');
        }
        return redirect()->route('admin.pangkat.index')->with('error', 'Data gagal disimpan.');
    }

    //method halaman edit
    public function edit(Request $request,$id) {
        $pangkat = Pangkat::findOrFail($id); //ambil data berdasarkan id dari halaman edit

        return view('admin.pages.pangkat.edit', compact('pangkat'));
    }

    //method fungsi edit data
    public function update(Request $request,$id) {
        // dd($request->all());
        $pangkat = Pangkat::findOrFail($id);

        $validated = $request->validate([
            'pangkat' => ['sometimes', 'required'],
        ]);
        
        $pangkat->update($validated); //perbarui data sesuai request dari $validated
        if ($pangkat) {
            return redirect()->route('admin.pangkat.index')->with('success', 'Data berhasil disimpan.');
        }
        return redirect()->route('admin.pangkat.index')->with('error', 'Data gagal disimpan.');
    }

    //method fungsi hapus data
    public function destroy($id) {
        $pangkat = Pangkat::findOrFail($id);

        //kondisi untuk hapus data
        if ($pangkat) {
            $pangkat->delete(); //hapus data, jika $pangkat ada
            return redirect()->route('admin.pangkat.index')->with('success', 'Data berhasil disimpan.');
        }
        return redirect()->route('admin.pangkat.index')->with('error', 'Data gagal disimpan.');
    }
}

