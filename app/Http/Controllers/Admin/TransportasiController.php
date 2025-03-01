<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Transportasi;
use Illuminate\Http\Request;

class TransportasiController extends Controller
{
    public function index() {
        $transportasi = Transportasi::all(); //ambil semua data di database melalui model
        return view('admin.pages.transportasi.index', compact('transportasi')); //compact agar data bisa ditampilkan dihalaman
    }

    //method halaman create 
    public function create() {
        return view('admin.pages.transportasi.create');
    }

    //method fungsi tambah data
    public function store(Request $request) {
        // dd($request->all());
        $validated = $request->validate([
            'alat_transport' => ['sometimes', 'required'],
        ]); //validasi field jika ada direquest dan agar diisi

        $created = Transportasi::create($validated); //buat data sesuai request dari $validated
        if ($created) {
            return redirect()->route('admin.transportasi.index')->with('success', 'Data berhasil disimpan.');
        }
        return redirect()->route('admin.transportasi.index')->with('error', 'Data gagal disimpan.');
    }

    //method halaman edit
    public function edit(Request $request,$id) {
        $transportasi = Transportasi::findOrFail($id); //ambil data berdasarkan id dari halaman edit

        return view('admin.pages.transportasi.edit', compact('transportasi'));
    }

    //method fungsi edit data
    public function update(Request $request,$id) {
        // dd($request->all());
        $transportasi = Transportasi::findOrFail($id);

        $validated = $request->validate([
            'alat_transport' => ['sometimes', 'required'],
        ]);
        
        $transportasi->update($validated); //perbarui data sesuai request dari $validated
        if ($transportasi) {
            return redirect()->route('admin.transportasi.index')->with('success', 'Data berhasil disimpan.');
        }
        return redirect()->route('admin.transportasi.index')->with('error', 'Data gagal disimpan.');
    }

    //method fungsi hapus data
    public function destroy($id) {
        $transportasi = Transportasi::findOrFail($id);

        //kondisi untuk hapus data
        if ($transportasi) {
            $transportasi->delete(); //hapus data, jika $transportasi ada
            return redirect()->route('admin.transportasi.index')->with('success', 'Data berhasil disimpan.');
        }
        return redirect()->route('admin.transportasi.index')->with('error', 'Data gagal disimpan.');
    }
}
