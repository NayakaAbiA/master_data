<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Penghasilan;
use Illuminate\Http\Request;

class PenghasilanController extends Controller
{
    public function index() {
        $penghasilan = Penghasilan::all(); //ambil semua data di database melalui model
        return view('admin.pages.penghasilan.index', compact('penghasilan')); //compact agar data bisa ditampilkan dihalaman
    }

    //method halaman create 
    public function create() {
        return view('admin.pages.penghasilan.create');
    }

    //method fungsi tambah data
    public function store(Request $request) {
        // dd($request->all());
        $validated = $request->validate([
            'penghasilan' => ['sometimes', 'required', 'string', 'max:20', 'unique:tb_penghasilan,penghasilan'],
        ]); //validasi field jika ada direquest dan agar diisi

        $created = Penghasilan::create($validated); //buat data sesuai request dari $validated
        if ($created) {
            return redirect()->route('admin.penghasilan.index')->with('success', 'Data berhasil disimpan.');
        }
        return redirect()->route('admin.peghasilan.index')->with('error', 'Data gagal disimpan.');
    }

    //method halaman edit
    public function edit(Request $request,$id) {
        $penghasilan = Penghasilan::findOrFail($id); //ambil data berdasarkan id dari halaman edit

        return view('admin.pages.penghasilan.edit', compact('penghasilan'));
    }

    //method fungsi edit data
    public function update(Request $request,$id) {
        // dd($request->all());
        $penghasilan = Penghasilan::findOrFail($id);

        $validated = $request->validate([
            'penghasilan' => ['sometimes', 'required', 'string', 'max:20'],
        ]);
        
        $penghasilan->update($validated); //perbarui data sesuai request dari $validated
        if ($penghasilan) {
            return redirect()->route('admin.penghasilan.index')->with('success', 'Data berhasil disimpan.');
        }
        return redirect()->route('admin.penghasilan.index')->with('error', 'Data gagal disimpan.');
    }

    //method fungsi hapus data
    public function destroy($id) {
        $penghasilan = Penghasilan::findOrFail($id);

        //kondisi untuk hapus data
        if ($penghasilan) {
            $penghasilan->delete(); //hapus data, jika $penghasilan ada
            return redirect()->route('admin.penghasilan.index')->with('success', 'Data berhasil disimpan.');
        }
        return redirect()->route('admin.penghasilan.index')->with('error', 'Data gagal disimpan.');
    }
}
