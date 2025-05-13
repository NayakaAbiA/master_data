<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Sekolah;
use Illuminate\Http\Request;

class SekolahController extends Controller
{
    public function index() {
        $sekolah = Sekolah::all(); //ambil semua data di database melalui model
        return view('admin.pages.sekolah.index', compact('sekolah')); //compact agar data bisa ditampilkan dihalaman
    }

    //method halaman create 
    public function create() {
        return view('admin.pages.sekolah.create');
    }

    //method fungsi tambah data
    public function store(Request $request) {
        // dd($request->all());
        $validated = $request->validate([
            'npsn' => ['sometimes', 'required', 'string', 'max:12', 'unique:tb_sekolah,npsn'],
            'nama_sekolah' => ['sometimes', 'required', 'string', 'max:50', 'unique:tb_sekolah,nama_sekolah'],
            'jenjang' => ['sometimes', 'required', 'string', 'max:30', 'unique:tb_sekolah,jenjang'],
        ]); //validasi field jika ada direquest dan agar diisi

        $created = Sekolah::create($validated); //buat data sesuai request dari $validated
        if ($created) {
            return redirect()->route('admin.sekolah.index')->with('success', 'Data berhasil disimpan.');
        }
        return redirect()->route('admin.sekolah.index')->with('error', 'Data gagal disimpan.');
    }

    //method halaman edit
    public function edit(Request $request,$id) {
        $sekolah = Sekolah::findOrFail($id); //ambil data berdasarkan id dari halaman edit

        return view('admin.pages.sekolah.edit', compact('sekolah'));
    }

    //method fungsi edit data
    public function update(Request $request,$id) {
        // dd($request->all());
        $sekolah = Sekolah::findOrFail($id);

        $validated = $request->validate([
            'npsn' => ['sometimes', 'required', 'string', 'max:12'],
            'nama_sekolah' => ['sometimes', 'required', 'string', 'max:50'],
            'jenjang' => ['sometimes', 'required', 'string', 'max:30'],
        ]);
        
        $sekolah->update($validated); //perbarui data sesuai request dari $validated
        if ($sekolah) {
            return redirect()->route('admin.sekolah.index')->with('success', 'Data berhasil disimpan.');
        }
        return redirect()->route('admin.sekolah.index')->with('error', 'Data gagal disimpan.');
    }

    //method fungsi hapus data
    public function destroy($id) {
        $sekolah = Sekolah::findOrFail($id);

        //kondisi untuk hapus data
        if ($sekolah) {
            $sekolah->delete(); //hapus data, jika $bank ada
            return redirect()->route('admin.sekolah.index')->with('success', 'Data berhasil disimpan.');
        }
        return redirect()->route('admin.sekolah.index')->with('error', 'Data gagal disimpan.');
    }
}


