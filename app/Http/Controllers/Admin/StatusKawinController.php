<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\StatKawin;
use Illuminate\Http\Request;

class StatusKawinController extends Controller
{
    public function index() {
        $statkawin = StatKawin::all(); //ambil semua data di database melalui model
        return view('admin.pages.statuskawin.index', compact('statkawin')); //compact agar data bisa ditampilkan dihalaman
    }

    //method halaman create 
    public function create() {
        return view('admin.pages.statuskawin.create');
    }

    //method fungsi tambah data
    public function store(Request $request) {
        // dd($request->all());
        $validated = $request->validate([
            'status_kawin' => ['sometimes', 'required', 'string', 'max:30', 'unique:tb_statkawin,status_kawin'],
        ]); //validasi field jika ada direquest dan agar diisi

        $created = StatKawin::create($validated); //buat data sesuai request dari $validated
        if ($created) {
            return redirect()->route('admin.statkawin.index')->with('success', 'Data berhasil disimpan.');
        }
        return redirect()->route('admin.statkawin.index')->with('error', 'Data gagal disimpan.');
    }

    //method halaman edit
    public function edit(Request $request,$id) {
        $statkawin = StatKawin::findOrFail($id); //ambil data berdasarkan id dari halaman edit

        return view('admin.pages.statuskawin.edit', compact('statkawin'));
    }

    //method fungsi edit data
    public function update(Request $request,$id) {
        // dd($request->all());
        $statkawin = StatKawin::findOrFail($id);

        $validated = $request->validate([
            'status_kawin' => ['sometimes', 'required', 'string', 'max:30'],
        ]);
        
        $statkawin->update($validated); //perbarui data sesuai request dari $validated
        if ($statkawin) {
            return redirect()->route('admin.statkawin.index')->with('success', 'Data berhasil disimpan.');
        }
        return redirect()->route('admin.statkawin.index')->with('error', 'Data gagal disimpan.');
    }

    //method fungsi hapus data
    public function destroy($id) {
        $statkawin = StatKawin::findOrFail($id);

        //kondisi untuk hapus data
        if ($statkawin) {
            $statkawin->delete(); //hapus data, jika $statkawin ada
            return redirect()->route('admin.statkawin.index')->with('success', 'Data berhasil disimpan.');
        }
        return redirect()->route('admin.statkawin.index')->with('error', 'Data gagal disimpan.');
    }
}
