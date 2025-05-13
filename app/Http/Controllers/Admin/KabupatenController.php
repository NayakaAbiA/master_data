<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kabupaten;
use App\Models\Provinsi;

class KabupatenController extends Controller
{
    public function index() {
        $kabupaten = Kabupaten::with('provinsi')->get(); //ambil semua data di database melalui model,bersama dengan fungsi relasinya
        return view('admin.pages.kabupaten.index', compact('kabupaten')); //compact agar data bisa ditampilkan dihalaman
    }

    //method halaman create 
    public function create() {
        return view('admin.pages.kabupaten.create', ['provinsi' => Provinsi::get()]); //tambah untuk panggil fungsi 'provinsi' dan ambil dari model
    }

    //method fungsi tambah data
    public function store(Request $request) {
        //dd($request->all());
        $validated = $request->validate([
            'kabupaten' => ['sometimes', 'required', 'string', 'max:255', 'unique:tb_kabupaten,kabupaten'],
            'ibu_kota' => ['sometimes', 'required', 'string', 'max:255', 'unique:tb_kabupaten,ibu_kota'],
            'k_bsni' => ['sometimes', 'required', 'string', 'max:255', 'unique:tb_kabupaten,k_bsni'],
            'id_provinsi' => ['sometimes', 'required', 'integer'],
        ]); //validasi field jika ada direquest dan agar diisi

        $created = Kabupaten::create($validated); //buat data sesuai request dari $validated
        if ($created) {
            return redirect()->route('admin.kabupaten.index')->with('success', 'Data berhasil disimpan.');
        }
        return redirect()->route('admin.kabupaten.index')->with('error', 'Data gagal disimpan.');
    }

    //method halaman edit
    public function edit(Request $request,$id) {
        $data = [
           'kabupaten' => Kabupaten::findOrFail($id), //ambil data berdasarkan id dari halaman edit
           'provinsi' => Provinsi::get(), //ambil data provinsi dari fungsi 'provinsi'
        ];

        return view('admin.pages.kabupaten.edit', $data);
    }

    //method fungsi edit data
    public function update(Request $request,$id) {
        //dd($request->all());
        $kabupaten = Kabupaten::findOrFail($id);

        $validated = $request->validate([
            'kabupaten' => ['sometimes', 'required', 'string', 'max:255'],
            'ibu_kota' => ['sometimes', 'required', 'string', 'max:255'],
            'k_bsni' => ['sometimes', 'required', 'string', 'max:255'],
            'id_provinsi' => ['sometimes', 'required', 'integer'],
        ]);
        
        $kabupaten->update($validated); //perbarui data sesuai request dari $validated
        if ($kabupaten) {
            return redirect()->route('admin.kabupaten.index')->with('success', 'Data berhasil disimpan.');
        }
        return redirect()->route('admin.kabupaten.index')->with('error', 'Data gagal disimpan.');
    }

    //method fungsi hapus data
    public function destroy($id) {
        $kabupaten = Kabupaten::findOrFail($id);

        //kondisi untuk hapus data
        if ($kabupaten) {
            $kabupaten->delete(); //hapus data, jika $kabupaten ada
            return redirect()->route('admin.kabupaten.index')->with('success', 'Data berhasil disimpan.');
        }
        return redirect()->route('admin.kabupaten.index')->with('error', 'Data gagal disimpan.');
    }
}
