<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $role = Role::all();
        return view('Admin.pages.role.index', compact('role'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Admin.pages.role.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'role' => ['sometimes', 'required', 'string', 'max:225', 'unique:roles,role'],
        ]); //validasi field jika ada direquest dan agar diisi

        $created = Role::create($validated); //buat data sesuai request dari $validated
        if ($created) {
            return redirect()->route('admin.role.index')->with('success', 'Data berhasil disimpan.');
        }
        return redirect()->route('admin.role.index')->with('error', 'Data gagal disimpan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $role = Role::findOrFail($id);
        return view('Admin.pages.role.edit', compact('role'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
         $role = Role::findOrFail($id);

        $validated = $request->validate([
            'role' => ['sometimes', 'required', 'string', 'max:225'],
        ]);
        
        $role->update($validated); //perbarui data sesuai request dari $validated
        if ($role) {
            return redirect()->route('admin.role.index')->with('success', 'Data berhasil disimpan.');
        }
        return redirect()->route('admin.role.index')->with('error', 'Data gagal disimpan.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $role = Role::findOrFail($id);

        //kondisi untuk hapus data
        if ($role) {
            $role->delete(); //hapus data, jika $role ada
            return redirect()->route('admin.role.index')->with('success', 'Data berhasil disimpan.');
        }
        return redirect()->route('admin.role.index')->with('error', 'Data gagal disimpan.');
    }
}
