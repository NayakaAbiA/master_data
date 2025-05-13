<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\KrtBantuan;
use Illuminate\Http\Request;

class KrtBantuanController extends Controller
{
    public function index() {
        $krtbantuan = KrtBantuan::all(); //ambil semua data di database melalui model
        return view('admin.pages.krtbantuan.index', compact('krtbantuan')); //compact agar data bisa ditampilkan dihalaman
    }

    //method halaman create 
    public function create() {
        return view('admin.pages.krtbantuan.create');
    }

    //method fungsi tambah data
    public function store(Request $request) {
        // dd($request->all());
        $validated = $request->validate([
            'no_krtbantuan' => ['sometimes', 'required', 'string', 'max:15', 'unique:tb_krtbantuan,no_krtbantuan'],
            'nama_krtbantuan' => ['sometimes', 'required', 'string', 'max:15', 'unique:tb_krtbantuan,nama_krtbantuan'],
            'nama_pdkrt' => ['sometimes', 'required', 'string', 'max:40', 'unique:tb_krtbantuan,nama_pdkrt'],
        ]); //validasi field jika ada direquest dan agar diisi

        $created = KrtBantuan::create($validated); //buat data sesuai request dari $validated
        if ($created) {
            return redirect()->route('admin.krtbantuan.index')->with('success', 'Data berhasil disimpan.');
        }
        return redirect()->route('admin.krtbantuan.index')->with('error', 'Data gagal disimpan.');
    }

    //method halaman edit
    public function edit(Request $request,$id) {
        $krtbantuan = KrtBantuan::findOrFail($id); //ambil data berdasarkan id dari halaman edit

        return view('admin.pages.krtbantuan.edit', compact('krtbantuan'));
    }

    //method fungsi edit data
    public function update(Request $request,$id) {
        // dd($request->all());
        $krtbantuan = KrtBantuan::findOrFail($id);

        $validated = $request->validate([
            'no_krtbantuan' => ['sometimes', 'required', 'string', 'max:15'],
            'nama_krtbantuan' => ['sometimes', 'required', 'string', 'max:15'],
            'nama_pdkrt' => ['sometimes', 'required', 'string', 'max:40'],
        ]);
        
        $krtbantuan->update($validated); //perbarui data sesuai request dari $validated
        if ($krtbantuan) {
            return redirect()->route('admin.krtbantuan.index')->with('success', 'Data berhasil disimpan.');
        }
        return redirect()->route('admin.krtbantuan.index')->with('error', 'Data gagal disimpan.');
    }

    //method fungsi hapus data
    public function destroy($id) {
        $krtbantuan = KrtBantuan::findOrFail($id);

        //kondisi untuk hapus data
        if ($krtbantuan) {
            $krtbantuan->delete(); //hapus data, jika $bank ada
            return redirect()->route('admin.krtbantuan.index')->with('success', 'Data berhasil disimpan.');
        }
        return redirect()->route('admin.krtbantuan.index')->with('error', 'Data gagal disimpan.');
    }
}


