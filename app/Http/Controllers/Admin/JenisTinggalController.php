<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\JenisTinggal;


class JenisTinggalController extends Controller
{
    //method halaman index 
    public function index() {
        $jenistggl = JenisTinggal::all(); //ambil semua data di database melalui model
        return view('admin.pages.jenis_tinggal.index', compact('jenistggl')); //compact agar data bisa ditampilkan dihalaman
    }

    //method halaman create 
    public function create() {
        return view('admin.pages.jenis_tinggal.create');
    }

    //method fungsi tambah data
    public function store(Request $request) {
        // dd($request->all());
        $validated = $request->validate([
            'jnstinggal' => ['sometimes', 'required', 'string', 'max:20', 'unique:tb_jnstinggal,jnstinggal'],
        ]); //validasi field jika ada direquest dan agar diisi

        $created = JenisTinggal::create($validated); //buat data sesuai request dari $validated
        if ($created) {
            return redirect()->route('admin.jenistggl.index')->with('success', 'Data berhasil disimpan.');
        }
        return redirect()->route('admin.jenistggl.index')->with('error', 'Data gagal disimpan.');
    }

    //method halaman edit
    public function edit(Request $request,$id) {
        $jenistggl = JenisTinggal::findOrFail($id); //ambil data berdasarkan id dari halaman edit

        return view('admin.pages.jenis_tinggal.edit', compact('jenistggl'));
    }

    //method fungsi edit data
    public function update(Request $request,$id) {
        // dd($request->all());
        $jenistggl = JenisTinggal::findOrFail($id);

        $validated = $request->validate([
            'jnstinggal' => ['sometimes', 'required', 'string', 'max:20'],
        ]);
        
        $jenistggl->update($validated); //perbarui data sesuai request dari $validated
        if ($jenistggl) {
            return redirect()->route('admin.jenistggl.index')->with('success', 'Data berhasil disimpan.');
        }
        return redirect()->route('admin.jenistggl.index')->with('error', 'Data gagal disimpan.');
    }

    //method fungsi hapus data
    public function destroy($id) {
        $jenistggl = JenisTinggal::findOrFail($id);

        //kondisi untuk hapus data
        if ($jenistggl) {
            $jenistggl->delete(); //hapus data, jika $jenistggl ada
            return redirect()->route('admin.jenistggl.index')->with('success', 'Data berhasil disimpan.');
        }
        return redirect()->route('admin.jenistggl.index')->with('error', 'Data gagal disimpan.');
    }
}
