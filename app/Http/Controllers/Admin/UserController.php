<?php

namespace App\Http\Controllers\Admin;

use App\Models\Role;
use App\Models\User;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Pegawai;
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
        return view('Admin.pages.user.create', compact('role','ptk'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $parameter = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'role_id' => $request->role_id,
            'ptk_id' => $request->ptk_id
        ];

        $client = new Client();
        $url = 'http://127.0.0.1:8000/api/user';
        $response = $client->request('POST', $url, [
            'headers' => ['Content-type' => 'application/json'],
            'body' => json_encode($parameter)
        ]);

        $content = $response->getBody()->getContents();
        $contentArray = json_decode($content, true);

        if (!$contentArray['status']) {
            $error = $contentArray['data'];
            return redirect()->back()->withErrors($error)->withInput();
        }

        return redirect()->to('admin/user')->with('success', 'Berhasil menambahkan data');
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
            return view('admin.pages.user.edit', [
                'user' => $user,
                'roles' => $roles,
                'ptk' => $ptk
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $parameter = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'role_id' => $request->role_id,
            'ptk_id' => $request->ptk_id
        ];

        $client = new Client();
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

        return redirect()->to('admin/user')->with('success', 'Berhasil memperbarui data');
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
