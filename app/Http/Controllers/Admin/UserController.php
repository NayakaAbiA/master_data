<?php

namespace App\Http\Controllers\Admin;

use App\Models\Role;
use App\Models\User;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Pegawai;
use App\Models\Siswa;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $client = new Client();
        $url = 'http://127.0.0.1:8000/api/user';
        $response = $client->request('GET', $url);
        $content = $response->getBody()->getContents();
        $contentArray = json_decode($content, true);
        $users = $contentArray['data'];
        return view('admin.pages.user.index', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $role = Role::all();
        $ptk = Pegawai::all();
        $siswa = Siswa::all();
        return view('Admin.pages.user.create', compact('role','ptk','siswa'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Ambil ID role pegawai & siswa dari database atau hardcoded
        $pegawaiRoleId = 5; // sesuaikan
        $siswaRoleId = 6;   // sesuaikan

        // Validasi lokal (opsional tapi disarankan)
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'role_id' => 'required|exists:roles,id',
            'ptk_id' => 'required_if:role_id,' . $pegawaiRoleId,
            'siswa_id' => 'required_if:role_id,' . $siswaRoleId,
        ]);

        // Buat parameter dinamis tergantung role
        $parameter = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'role_id' => $request->role_id,
        ];

        if ($request->role_id == $pegawaiRoleId) {
            $parameter['ptk_id'] = $request->ptk_id;
        } elseif ($request->role_id == $siswaRoleId) {
            $parameter['siswa_id'] = $request->siswa_id;
        }

        // Kirim ke API
        $client = new Client();
        $url = 'http://127.0.0.1:8000/api/user';

        try {
            $response = $client->request('POST', $url, [
                'headers' => ['Content-Type' => 'application/json'],
                'body' => json_encode($parameter),
            ]);

            $content = $response->getBody()->getContents();
            $contentArray = json_decode($content, true);

            if (!$contentArray['status']) {
                $error = $contentArray['data'];
                return redirect()->back()->withErrors($error)->withInput();
            }

            return redirect()->route('admin.user.index')->with('success', 'Berhasil menambahkan data');

        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Terjadi kesalahan saat menghubungi API.'])->withInput();
        }
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
        $client = new Client();
        $url = "http://127.0.0.1:8000/api/user/$id";
        $response = $client->request('GET', $url);
        $content = $response->getBody()->getContents();
        $contentArray = json_decode($content, true);

        if (!$contentArray['status']) {
            echo "Data tidak ditemukan";
        } else {
            $user = $contentArray['data'];
            $roles = Role::all();
            $ptk = Pegawai::all();
            $siswa = Siswa::all();
            return view('admin.pages.user.edit', [
                'user' => $user,
                'roles' => $roles,
                'ptk' => $ptk,
                'siswa' => $siswa
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Ambil ID role pegawai & siswa dari database atau hardcoded
        $pegawaiRoleId = 5; // sesuaikan
        $siswaRoleId = 6;   // sesuaikan

        // Validasi dinamis tergantung role
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'nullable|min:6',
            'role_id' => 'required|exists:roles,id',
            'ptk_id' => 'required_if:role_id,' . $pegawaiRoleId,
            'siswa_id' => 'required_if:role_id,' . $siswaRoleId,
        ]);

        // Buat parameter dinamis
        $parameter = [
            'name' => $request->name,
            'email' => $request->email,
            'role_id' => $request->role_id,
        ];

        if (!empty($request->password)) {
            $parameter['password'] = $request->password;
        }

        if ($request->role_id == $pegawaiRoleId) {
            $parameter['ptk_id'] = $request->ptk_id;
            $parameter['siswa_id'] = null; // pastikan kosong
        } elseif ($request->role_id == $siswaRoleId) {
            $parameter['siswa_id'] = $request->siswa_id;
            $parameter['ptk_id'] = null; // pastikan kosong
        }

        try {
            $client = new \GuzzleHttp\Client();
            $url = "http://127.0.0.1:8000/api/user/$id";

            $response = $client->request('PUT', $url, [
                'headers' => ['Content-type' => 'application/json'],
                'body' => json_encode($parameter)
            ]);
            
            $content = $response->getBody()->getContents();
            $contentArray = json_decode($content, true);

            if (!$contentArray['status']) {
                $error = $contentArray['data'];
                return redirect()->back()->withErrors($error)->withInput();
            }

            return redirect()->route('admin.user.index')->with('success', 'Berhasil memperbarui data');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Terjadi kesalahan saat menghubungi API.'])->withInput();
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $client = new Client();
        $url = "http://127.0.0.1:8000/api/user/$id";
        $response = $client->request('DELETE', $url);
        $content = $response->getBody()->getContents();
        $contentArray = json_decode($content, true);

        if (!$contentArray['status']) {
            $error = $contentArray['data'];
            return redirect()->back()->withErrors($error)->withInput();
        }

        return redirect()->to('admin/user')->with('success', 'Berhasil menghapus data');
    }
}
