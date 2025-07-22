<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = User::with('role','ptk','siswa')->get();
        return response()->json([
            'status' => true,
            'message' => 'Data berhasil ditemukan',
            'data' => $data
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $pegawaiRoleId = 5; // sesuaikan dengan ID role pegawai
    $siswaRoleId = 6;   // sesuaikan dengan ID role siswa
    // Validasi dasar
    $rules = [
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'email', 'max:255', 'unique:users,email'],
        'password' => ['required', 'min:6'],
        'role_id' => ['required', 'exists:roles,id'],
    ];

    // Tambahkan validasi berdasarkan role
    if ($request->role_id == $pegawaiRoleId) {
        $rules['ptk_id'] = ['required', 'exists:tb_ptk,id'];
    } elseif ($request->role_id == $siswaRoleId) {
        $rules['siswa_id'] = ['required', 'exists:tb_siswa,id'];
    }

    // Jalankan validasi
    $validator = Validator::make($request->all(), $rules);
    if ($validator->fails()) {
        return response()->json([
            'status' => false,
            'message' => 'Gagal menyimpan data',
            'data' => $validator->errors()
        ], 422);
    }

    // Simpan data
    $user = new User();
    $user->name = $request->name;
    $user->email = $request->email;
    $user->password = Hash::make($request->password);
    $user->role_id = $request->role_id;

    // Set relasi siswa/ptk berdasarkan role
    if ($request->role_id == $pegawaiRoleId) {
        $user->ptk_id = $request->ptk_id;
        $user->siswa_id = null;
    } elseif ($request->role_id == $siswaRoleId) {
        $user->siswa_id = $request->siswa_id;
        $user->ptk_id = null;
    }

    $user->save();

    return response()->json([
        'status' => true,
        'message' => 'Data berhasil ditambahkan',
        'data' => $user
    ], 201);
}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::with('role')->find($id);
        if ($user) {
            return response()->json([
                'status' => true,
                'message' => 'Data berhasil ditemukan',
                'data' => $user
            ], 200);
        }
        return response()->json([
            'status' => false,
            'message' => 'Data tidak ditemukan'
        ], 404);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $pegawaiRoleId = 5; // sesuaikan dengan ID role pegawai
        $siswaRoleId = 6;   // sesuaikan dengan ID role siswa

        $user = User::find($id);
        if (!$user) {
            return response()->json([
                'status' => false,
                'message' => 'Data tidak ditemukan'
            ], 404);
        }

        // Validasi dasar
        $rules = [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email,' . $user->id],
            'password' => ['nullable', 'min:6'],
            'role_id' => ['required', 'exists:roles,id'],
        ];

        // Tambahkan validasi berdasarkan role
        if ($request->role_id == $pegawaiRoleId) {
            $rules['ptk_id'] = ['required', 'exists:tb_ptk,id'];
        } elseif ($request->role_id == $siswaRoleId) {
            $rules['siswa_id'] = ['required', 'exists:tb_siswa,id'];
        }

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Gagal mengupdate data',
                'data' => $validator->errors()
            ], 422);
        }

        // Update data
        $user->name = $request->name;
        $user->email = $request->email;
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }
        $user->role_id = $request->role_id;

        // Set relasi siswa/ptk berdasarkan role
        if ($request->role_id == $pegawaiRoleId) {
            $user->ptk_id = $request->ptk_id;
            $user->siswa_id = null;
        } elseif ($request->role_id == $siswaRoleId) {
            $user->siswa_id = $request->siswa_id;
            $user->ptk_id = null;
        } else {
            // Jika bukan pegawai atau siswa, kosongkan keduanya
            $user->ptk_id = null;
            $user->siswa_id = null;
        }

        $user->save();

        return response()->json([
            'status' => true,
            'message' => 'Data berhasil diperbarui',
            'data' => $user
        ]);
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::find($id);
        if (!$user) {
            return response()->json([
                'status' => false,
                'message' => 'Data tidak ditemukan'
            ], 404);
        }

        $user->delete();

        return response()->json([
            'status' => true,
            'message' => 'Data berhasil dihapus'
        ]);
    }
}
