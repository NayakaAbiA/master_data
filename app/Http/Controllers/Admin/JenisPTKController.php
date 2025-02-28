<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\JenisPTK;

class JenisPTKController extends Controller
{
    public function index() {
        $jenisptk = JenisPTK::all();
        return view('admin.pages.jenis_ptk.index', compact('jenisptk'));
    }

    public function create() {
        return view('admin.pages.jenis_ptk.create');
    }

    public function store(Request $request) {
        // dd($request->all());
        $validated = $request->validate([
            'jenis_ptk' => ['sometimes', 'required'],
        ]);

        $created = JenisPTK::create($validated);
        if ($created) {
            return redirect()->route('admin.jenisptk.index')->with('success', 'Data berhasil disimpan.');
        }
        return redirect()->route('admin.jenisptk.index')->with('error', 'Data gagal disimpan.');
    }

    public function edit(Request $request,$id) {
        $jenisptk = JenisPTK::findOrFail($id);

        return view('admin.pages.jenis_ptk.edit', compact('jenisptk'));
    }
}
