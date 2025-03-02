<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kelurahan;
use App\Models\Kecamatan;

class KelurahanController extends Controller
{
    public function index() {
        $kelurahan = Kelurahan::with('kecamatan')->get(); //ambil semua data di database melalui model,bersama dengan fungsi relasinya
        return view('admin.pages.kelurahan.index', compact('kelurahan')); //compact agar data bisa ditampilkan dihalaman
    }

    //method halaman create 
    public function create() {
        return view('admin.pages.kelurahan.create', ['kecamatan' => Kecamatan::get()]); //tambah untuk panggil fungsi 'kecamatan' dan ambil dari model
    }

    //method fungsi tambah data
    public function store(Request $request) {
        //dd($request->all());
        $validated = $request->validate([
            'kelurahan' => ['sometimes', 'required'],
            'kode_pos' => ['sometimes', 'required'],
            'id_kecamatan' => ['sometimes', 'required'],
        ]); //validasi field jika ada direquest dan agar diisi

        $created = Kelurahan::create($validated); //buat data sesuai request dari $validated
        if ($created) {
            return redirect()->route('admin.kelurahan.index')->with('success', 'Data berhasil disimpan.');
        }
        return redirect()->route('admin.kelurahan.index')->with('error', 'Data gagal disimpan.');
    }

    //method halaman edit
    public function edit(Request $request,$id) {
        $data = [
           'kelurahan' => Kelurahan::findOrFail($id), //ambil data berdasarkan id dari halaman edit
           'kecamatan' => Kecamatan::get(), //ambil data kecamatan dari fungsi 'kecamatan'
        ];

        return view('admin.pages.kelurahan.edit', $data);
    }

    //method fungsi edit data
    public function update(Request $request,$id) {
        //dd($request->all());
        $kelurahan = Kelurahan::findOrFail($id);

        $validated = $request->validate([
            'kelurahan' => ['sometimes', 'required'],
            'kode_pos' => ['sometimes', 'required'],
            'id_kecamatan' => ['sometimes', 'required'],
        ]);
        
        $kelurahan->update($validated); //perbarui data sesuai request dari $validated
        if ($kelurahan) {
            return redirect()->route('admin.kelurahan.index')->with('success', 'Data berhasil disimpan.');
        }
        return redirect()->route('admin.kelurahan.index')->with('error', 'Data gagal disimpan.');
    }

    //method fungsi hapus data
    public function destroy($id) {
        $kelurahan = Kelurahan::findOrFail($id);

        //kondisi untuk hapus data
        if ($kelurahan) {
            $kelurahan->delete(); //hapus data, jika $kelurahan ada
            return redirect()->route('admin.kelurahan.index')->with('success', 'Data berhasil disimpan.');
        }
        return redirect()->route('admin.kelurahan.index')->with('error', 'Data gagal disimpan.');
    }
}
