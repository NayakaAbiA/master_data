<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TgsTambahan;
use Illuminate\Http\Request;

class TgsTambahanController extends Controller
{
    public function index() {
        $tgstambahan = TgsTambahan::all(); //ambil semua data di database melalui model
        return view('admin.pages.tgs_tambahan.index', compact('tgstambahan')); //compact agar data bisa ditampilkan dihalaman
    }

    //method halaman create 
    public function create() {
        return view('admin.pages.tgs_tambahan.create');
    }

    //method fungsi tambah data
    public function store(Request $request) {
        // dd($request->all());
        $validated = $request->validate([
            'tgs_tambahan' => ['sometimes', 'required', 'string', 'max:40', 'unique:tb_tgstambahan,tgs_tambahan'],
        ]); //validasi field jika ada direquest dan agar diisi

        $created = TgsTambahan::create($validated); //buat data sesuai request dari $validated
        if ($created) {
            return redirect()->route('admin.tgstambahan.index')->with('success', 'Data berhasil disimpan.');
        }
        return redirect()->route('admin.tgstambahan.index')->with('error', 'Data gagal disimpan.');
    }

    //method halaman edit
    public function edit(Request $request,$id) {
        $tgstambahan = TgsTambahan::findOrFail($id); //ambil data berdasarkan id dari halaman edit

        return view('admin.pages.tgs_tambahan.edit', compact('tgstambahan'));
    }

    //method fungsi edit data
    public function update(Request $request,$id) {
        // dd($request->all());
        $tgstambahan = TgsTambahan::findOrFail($id);

        $validated = $request->validate([
            'tgs_tambahan' => ['sometimes', 'required', 'string', 'max:40'],
        ]);
        
        $tgstambahan->update($validated); //perbarui data sesuai request dari $validated
        if ($tgstambahan) {
            return redirect()->route('admin.tgstambahan.index')->with('success', 'Data berhasil disimpan.');
        }
        return redirect()->route('admin.tgstambahan.index')->with('error', 'Data gagal disimpan.');
    }

    //method fungsi hapus data
    public function destroy($id) {
        $tgstambahan = TgsTambahan::findOrFail($id);

        //kondisi untuk hapus data
        if ($tgstambahan) {
            $tgstambahan->delete(); //hapus data, jika $tgstambahan ada
            return redirect()->route('admin.tgstambahan.index')->with('success', 'Data berhasil disimpan.');
        }
        return redirect()->route('admin.tgstambahan.index')->with('error', 'Data gagal disimpan.');
    }
}
