<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Provinsi;
use Illuminate\Http\Request;

class ProvinsiController extends Controller
{
    public function index() {
        $provinsi = Provinsi::all(); //ambil semua data di database melalui model
        return view('admin.pages.provinsi.index', compact('provinsi')); //compact agar data bisa ditampilkan dihalaman
    }

    //method halaman create 
    public function create() {
        return view('admin.pages.provinsi.create');
    }

    //method fungsi tambah data
    public function store(Request $request) {
        // dd($request->all());
        $validated = $request->validate([
            'provinsi' => ['sometimes', 'required', 'string', 'max:225', 'unique:tb_provinsi,provinsi'],
            'ibu_kota' => ['sometimes', 'required', 'string', 'max:225', 'unique:tb_provinsi,ibu_kota'],
            'p_bsni' => ['sometimes', 'required', 'string', 'max:225', 'unique:tb_provinsi,p_bsni'],
        ]); //validasi field jika ada direquest dan agar diisi

        $created = Provinsi::create($validated); //buat data sesuai request dari $validated
        if ($created) {
            return redirect()->route('admin.provinsi.index')->with('success', 'Data berhasil disimpan.');
        }
        return redirect()->route('admin.provinsi.index')->with('error', 'Data gagal disimpan.');
    }

    //method halaman edit
    public function edit(Request $request,$id) {
        $provinsi = Provinsi::findOrFail($id); //ambil data berdasarkan id dari halaman edit

        return view('admin.pages.provinsi.edit', compact('provinsi'));
    }

    //method fungsi edit data
    public function update(Request $request,$id) {
        // dd($request->all());
        $provinsi = Provinsi::findOrFail($id);

        $validated = $request->validate([
            'provinsi' => ['sometimes', 'required', 'string', 'max:225'],
            'ibu_kota' => ['sometimes', 'required', 'string', 'max:225'],
            'p_bsni' => ['sometimes', 'required', 'string', 'max:225'],
        ]);
        
        $provinsi->update($validated); //perbarui data sesuai request dari $validated
        if ($provinsi) {
            return redirect()->route('admin.provinsi.index')->with('success', 'Data berhasil disimpan.');
        }
        return redirect()->route('admin.provinsi.index')->with('error', 'Data gagal disimpan.');
    }

    //method fungsi hapus data
    public function destroy($id) {
        $provinsi = Provinsi::findOrFail($id);

        //kondisi untuk hapus data
        if ($provinsi) {
            $provinsi->delete(); //hapus data, jika $Provinsi ada
            return redirect()->route('admin.provinsi.index')->with('success', 'Data berhasil disimpan.');
        }
        return redirect()->route('admin.provinsi.index')->with('error', 'Data gagal disimpan.');
    }
}
