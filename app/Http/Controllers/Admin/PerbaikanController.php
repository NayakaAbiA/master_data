<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use GuzzleHttp\Client;
use App\Models\Rombel;
use Illuminate\Support\Facades\Auth;

class PerbaikanController extends Controller
{
    public function index()
    {
        $client = new Client();
        $response = $client->get('http://127.0.0.1:8000/api/perbaikan');
        $contentArray = json_decode($response->getBody()->getContents(), true);
        $perbaikan = collect($contentArray['data'] ?? []);

        $user = Auth::user();
        $ptk = $user->ptk;
        $rombels = $ptk ? Rombel::where('id_ptk_walas', $ptk->id)->get() : collect();

        // Filter data berdasarkan role
        if ($user->role->role === 'pegawai') {
            $perbaikan = $perbaikan->where('user_id', $user->id)->values();
        } elseif ($user->role->role === 'adminSiswa') {
            $perbaikan = $perbaikan->where('jenis', 'kelas')->values();
        } elseif ($user->role->role === 'adminPegawai') {
            $perbaikan = $perbaikan->where('jenis', 'pribadi')->values();
        }

        return view('admin.perbaikan.index', compact('perbaikan', 'rombels'));
    }

    public function create()
    {
        $user = Auth::user();
        $ptk = $user->ptk;
        $rombels = $ptk ? Rombel::where('id_ptk_walas', $ptk->id)->get() : collect();
        return view('admin.perbaikan.create', compact('rombels'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'jenis' => 'required|in:Pribadi,Kelas',
            'deskripsi' => 'required|string',
            'lampiran' => 'nullable|file|mimes:pdf,jpg,jpeg,png,doc,docx|max:2048',
        ]);

        $client = new Client();
        $data = [
            'jenis' => $request->jenis,
            'deskripsi' => $request->deskripsi,
            'user_id' => auth()->id(),
        ];

        $multipart = [];
        foreach ($data as $key => $value) {
            $multipart[] = ['name' => $key, 'contents' => $value];
        }

        if ($request->hasFile('lampiran')) {
            $multipart[] = [
                'name' => 'lampiran',
                'contents' => fopen($request->file('lampiran')->getPathname(), 'r'),
                'filename' => $request->file('lampiran')->getClientOriginalName()
            ];
        }

        $response = $client->request('POST', 'http://127.0.0.1:8000/api/perbaikan', [
            'multipart' => $multipart,
        ]);

        $content = json_decode($response->getBody()->getContents(), true);

        if (!$content['status']) {
            return redirect()->back()->withErrors($content['data'])->withInput();
        }

        return redirect()->route('admin.perbaikan.index')->with('success', 'Perbaikan berhasil dikirim');
    }

    public function edit($id)
    {
        $client = new Client();
        $response = $client->get("http://127.0.0.1:8000/api/perbaikan/$id");
        $content = json_decode($response->getBody()->getContents(), true);

        if (!$content['status']) {
            abort(404, 'Data tidak ditemukan');
        }

        $perbaikan = $content['data'];
        return view('admin.perbaikan.edit', compact('perbaikan'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:Menunggu,Disetujui,Ditolak',
            'lampiran' => 'nullable|file|mimes:pdf,jpg,jpeg,png,doc,docx|max:2048',
        ]);

        $client = new Client();
        $multipart = [
            ['name' => 'status', 'contents' => $request->status],
        ];

        if ($request->hasFile('lampiran')) {
            $multipart[] = [
                'name' => 'lampiran',
                'contents' => fopen($request->file('lampiran')->getPathname(), 'r'),
                'filename' => $request->file('lampiran')->getClientOriginalName()
            ];
        }

        $response = $client->request('POST', "http://127.0.0.1:8000/api/perbaikan/$id?_method=PUT", [
            'multipart' => $multipart,
        ]);

        $content = json_decode($response->getBody()->getContents(), true);

        if (!$content['status']) {
            return redirect()->back()->withErrors($content['data'])->withInput();
        }

        return redirect()->route('admin.perbaikan.index')->with('success', 'Status perbaikan diperbarui');
    }

    public function destroy($id)
    {
        $client = new Client();
        $response = $client->delete("http://127.0.0.1:8000/api/perbaikan/$id");
        $content = json_decode($response->getBody()->getContents(), true);

        if (!$content['status']) {
            return redirect()->back()->withErrors($content['data']);
        }

        return redirect()->route('admin.perbaikan.index')->with('success', 'Data berhasil dihapus');
    }
}
