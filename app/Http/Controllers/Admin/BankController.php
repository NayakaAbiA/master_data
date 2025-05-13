<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Bank;
use Illuminate\Http\Request;

class BankController extends Controller
{
    public function index() {
        $bank = Bank::all(); //ambil semua data di database melalui model
        return view('admin.pages.bank.index', compact('bank')); //compact agar data bisa ditampilkan dihalaman
    }

    //method halaman create 
    public function create() {
        return view('admin.pages.bank.create');
    }

    //method fungsi tambah data
    public function store(Request $request) {
        // dd($request->all());
        $validated = $request->validate([
            'nama_bank' => ['sometimes', 'required', 'string', 'max:50', 'unique:tb_bank,nama_bank'],
        ]); //validasi field jika ada direquest dan agar diisi

        $created = Bank::create($validated); //buat data sesuai request dari $validated
        if ($created) {
            return redirect()->route('admin.bank.index')->with('success', 'Data berhasil disimpan.');
        }
        return redirect()->route('admin.bank.index')->with('error', 'Data gagal disimpan.');
    }

    //method halaman edit
    public function edit(Request $request,$id) {
        $bank = Bank::findOrFail($id); //ambil data berdasarkan id dari halaman edit

        return view('admin.pages.bank.edit', compact('bank'));
    }

    //method fungsi edit data
    public function update(Request $request,$id) {
        // dd($request->all());
        $bank = Bank::findOrFail($id);

        $validated = $request->validate([
            'nama_bank' => ['sometimes', 'required', 'string', 'max:50'],
        ]);
        
        $bank->update($validated); //perbarui data sesuai request dari $validated
        if ($bank) {
            return redirect()->route('admin.bank.index')->with('success', 'Data berhasil disimpan.');
        }
        return redirect()->route('admin.bank.index')->with('error', 'Data gagal disimpan.');
    }

    //method fungsi hapus data
    public function destroy($id) {
        $bank = Bank::findOrFail($id);

        //kondisi untuk hapus data
        if ($bank) {
            $bank->delete(); //hapus data, jika $bank ada
            return redirect()->route('admin.bank.index')->with('success', 'Data berhasil disimpan.');
        }
        return redirect()->route('admin.bank.index')->with('error', 'Data gagal disimpan.');
    }
}


