<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\KebKhusus;

class KebKhususController extends Controller
{
    //method halaman index 
    public function index() {
        $kebkhusus = KebKhusus::all(); //ambil semua data di database melalui model
        return view('admin.pages.kebkhusus.index', compact('kebkhusus')); //compact agar data bisa ditampilkan dihalaman
    }

    //method halaman create 
    public function create() {
        return view('admin.pages.kebkhusus.create');
    }

    //method fungsi tambah data
    public function store(Request $request) {
        // dd($request->all());
        $validated = $request->validate([
            'kebkhusus' => ['sometimes', 'required', 'string', 'max:30', 'unique:tb_kebkhusus,kebkhusus'],
        ]); //validasi field jika ada direquest dan agar diisi

        $created = KebKhusus::create($validated); //buat data sesuai request dari $validated
        if ($created) {
            return redirect()->route('admin.kebkhusus.index')->with('success', 'Data berhasil disimpan.');
        }
        return redirect()->route('admin.kebkhusus.index')->with('error', 'Data gagal disimpan.');
    }

    //method halaman edit
    public function edit(Request $request,$id) {
        $kebkhusus = KebKhusus::findOrFail($id); //ambil data berdasarkan id dari halaman edit

        return view('admin.pages.kebkhusus.edit', compact('kebkhusus'));
    }

    //method fungsi edit data
    public function update(Request $request,$id) {
        // dd($request->all());
        $kebkhusus = KebKhusus::findOrFail($id);

        $validated = $request->validate([
            'kebkhusus' => ['sometimes', 'required', 'string', 'max:30'],
        ]);
        
        $kebkhusus->update($validated); //perbarui data sesuai request dari $validated
        if ($kebkhusus) {
            return redirect()->route('admin.kebkhusus.index')->with('success', 'Data berhasil disimpan.');
        }
        return redirect()->route('admin.kebkhusus.index')->with('error', 'Data gagal disimpan.');
    }

    //method fungsi hapus data
    public function destroy($id) {
        $kebkhusus = KebKhusus::findOrFail($id);

        //kondisi untuk hapus data
        if ($kebkhusus) {
            $kebkhusus->delete(); //hapus data, jika $kebkhusus ada
            return redirect()->route('admin.kebkhusus.index')->with('success', 'Data berhasil disimpan.');
        }
        return redirect()->route('admin.kebkhusus.index')->with('error', 'Data gagal disimpan.');
    }
}
