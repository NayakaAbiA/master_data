<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kecamatan;
use App\Models\Kabupaten;

class KecamatanController extends Controller
{
    public function index() {
        $kecamatan = Kecamatan::with('kabupaten')->get(); //ambil semua data di database melalui model,bersama dengan fungsi relasinya
        return view('admin.pages.kecamatan.index', compact('kecamatan')); //compact agar data bisa ditampilkan dihalaman
    }

    //method halaman create 
    public function create() {
        return view('admin.pages.kecamatan.create', ['kabupaten' => Kabupaten::get()]); //tambah untuk panggil fungsi 'kabupaten' dan ambil dari model
    }

    //method fungsi tambah data
    public function store(Request $request) {
        //dd($request->all());
        $validated = $request->validate([
            'kecamatan' => ['sometimes', 'required'],
            'id_kabupaten' => ['sometimes', 'required'],
        ]); //validasi field jika ada direquest dan agar diisi

        $created = Kecamatan::create($validated); //buat data sesuai request dari $validated
        if ($created) {
            return redirect()->route('admin.kecamatan.index')->with('success', 'Data berhasil disimpan.');
        }
        return redirect()->route('admin.kecamatan.index')->with('error', 'Data gagal disimpan.');
    }

    //method halaman edit
    public function edit(Request $request,$id) {
        $data = [
           'kecamatan' => Kecamatan::findOrFail($id), //ambil data berdasarkan id dari halaman edit
           'kabupaten' => Kabupaten::get(), //ambil data kabupaten dari fungsi 'kabupaten'
        ];

        return view('admin.pages.kecamatan.edit', $data);
    }

    //method fungsi edit data
    public function update(Request $request,$id) {
        //dd($request->all());
        $kecamatan = Kecamatan::findOrFail($id);

        $validated = $request->validate([
            'kecamatan' => ['sometimes', 'required'],
            'id_kabupaten' => ['sometimes', 'required'],
        ]);
        
        $kecamatan->update($validated); //perbarui data sesuai request dari $validated
        if ($kecamatan) {
            return redirect()->route('admin.kecamatan.index')->with('success', 'Data berhasil disimpan.');
        }
        return redirect()->route('admin.kecamatan.index')->with('error', 'Data gagal disimpan.');
    }

    //method fungsi hapus data
    public function destroy($id) {
        $kecamatan = Kecamatan::findOrFail($id);

        //kondisi untuk hapus data
        if ($kecamatan) {
            $kecamatan->delete(); //hapus data, jika $kecamatan ada
            return redirect()->route('admin.kecamatan.index')->with('success', 'Data berhasil disimpan.');
        }
        return redirect()->route('admin.kecamatan.index')->with('error', 'Data gagal disimpan.');
    }
}
