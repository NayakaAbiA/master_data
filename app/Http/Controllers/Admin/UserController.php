<?php

namespace App\Http\Controllers\Admin;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::with('role')->get();
        return view('Admin.pages.user.index', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $role = Role::all();
        return view('Admin.pages.user.create', compact('role'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $validated = $request->validate([
            'name' => ['sometimes', 'required', 'string', 'max:255'],
            'email' => ['sometimes', 'required', 'email', 'max:255', 'unique:users,email,'],
            'password' => ['sometimes', 'required', 'max:255'],
            'role_id' => ['sometimes', 'required', 'integer'],
        ],[
            'email.unique' => 'Email sudah tersedia.',
        ]); //validasi field jika ada direquest dan agar diisi
         $validated['password'] = Hash::make($request->input('password')); //hash jika ada password

        $created = User::create($validated); //buat data sesuai request dari $validated
        if ($created) {
            return redirect()->route('admin.user.index')->with('success', 'Data berhasil disimpan.');
        }
        return redirect()->route('admin.user.index')->with('error', 'Data gagal disimpan.');
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
        $data = [
            'user' => User::findOrFail($id),
            'role' => Role::all()
        ];
        return view('Admin.pages.user.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
       $user = User::findOrFail($id);

        // Validasi data yang diterima
        $validated = $request->validate([
            'name' => ['sometimes', 'required', 'string', 'max:255'],
            'email' => ['sometimes', 'required', 'email', 'max:255', 'unique:users,email,' . $user->id],
            'password' => ['nullable'], 
            'role_id' => ['sometimes', 'required', 'exists:roles,id'],
        ]);

        // Jika password diisi, lakukan hashing dan simpan
        if ($request->filled('password')) {
            // Hanya jika password diisi, kita akan mengubah password
            $user->password = Hash::make($request->input('password'));
        } else {
            // Jika password tidak diubah, hapus password dari validated array
            unset($validated['password']);
        }

        $user->update($validated); //perbarui data sesuai request dari $validated
        if ($user) {
            return redirect()->route('admin.user.index')->with('success', 'Data berhasil disimpan.');
        }
        return redirect()->route('admin.user.index')->with('error', 'Data gagal disimpan.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
         $user = User::findOrFail($id);

        //kondisi untuk hapus data
        if ($user) {
            $user->delete(); //hapus data, jika $transportasi ada
            return redirect()->route('admin.user.index')->with('success', 'Data berhasil di delete.');
        }
        return redirect()->route('admin.user.index')->with('error', 'Data gagal disimpan.');
    }
}
