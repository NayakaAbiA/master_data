<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\StatPegawai;
use Illuminate\Http\Request;

class StatusPegawaiController extends Controller
{
    public function index() {
        $statpeg = StatPegawai::all(); //ambil semua data di database melalui model
        return view('admin.pages.statuspegawai.index', compact('statpeg')); //compact agar data bisa ditampilkan dihalaman
    }

    //method halaman create 
    public function create() {
        return view('admin.pages.statuspegawai.create');
    }

    //method fungsi tambah data
    public function store(Request $request) {
        // dd($request->all());
        $validated = $request->validate([
            'stat_peg' => ['sometimes', 'required'],
        ]); //validasi field jika ada direquest dan agar diisi

        $created = StatPegawai::create($validated); //buat data sesuai request dari $validated
        if ($created) {
            return redirect()->route('admin.statpeg.index')->with('success', 'Data berhasil disimpan.');
        }
        return redirect()->route('admin.statpeg.index')->with('error', 'Data gagal disimpan.');
    }

    //method halaman edit
    public function edit(Request $request,$id) {
        $statpeg = StatPegawai::findOrFail($id); //ambil data berdasarkan id dari halaman edit

        return view('admin.pages.statuspegawai.edit', compact('statpeg'));
    }

    //method fungsi edit data
    public function update(Request $request,$id) {
        // dd($request->all());
        $statpeg = StatPegawai::findOrFail($id);

        $validated = $request->validate([
            'stat_peg' => ['sometimes', 'required'],
        ]);
        
        $statpeg->update($validated); //perbarui data sesuai request dari $validated
        if ($statpeg) {
            return redirect()->route('admin.statpeg.index')->with('success', 'Data berhasil disimpan.');
        }
        return redirect()->route('admin.statpeg.index')->with('error', 'Data gagal disimpan.');
    }

    //method fungsi hapus data
    public function destroy($id) {
        $statpeg = StatPegawai::findOrFail($id);

        //kondisi untuk hapus data
        if ($statpeg) {
            $statpeg->delete(); //hapus data, jika $statpeg ada
            return redirect()->route('admin.statpeg.index')->with('success', 'Data berhasil disimpan.');
        }
        return redirect()->route('admin.statpeg.index')->with('error', 'Data gagal disimpan.');
    }
}
