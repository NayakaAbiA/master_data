<?php

namespace App\Http\Controllers\Admin;

use GuzzleHttp\Client;
use App\Models\Jurusan;
use App\Models\Pegawai;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class JurusanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $client = new Client();
        $url = 'http://127.0.0.1:8000/api/jurusan';
        $response = $client->request('GET', $url);
        $content = $response->getBody()->getContents();
        $contentArray = json_decode($content, true);
        $jurusan = $contentArray['data'];
        return view('admin.pages.jurusan.index', ['jurusan'=>$jurusan]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $ptk = Pegawai::all();
        return view('Admin.pages.jurusan.create', compact('ptk'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $nama_jur = $request->nama_jur;
        $id_ptk_kakom = $request->id_ptk_kakom;
        $parameter = [
            'nama_jur'=>$nama_jur,
            'id_ptk_kakom'=>$id_ptk_kakom
        ];

        $client = new Client();
        $url = 'http://127.0.0.1:8000/api/jurusan';
        $response = $client->request('POST', $url, [
            'headers'=>['Content-type'=>'application/json'],
            'body'=>json_encode($parameter)
        ]);
        $content = $response->getBody()->getContents();
        $contentArray = json_decode($content, true);
        if($contentArray['status']!= true) {
            $error = $contentArray['data'];
            return redirect()->back()->withErrors($error)->withInput();
        }else{
            return redirect()->to('admin/jurusan')->with('success','Berhasil memasukan data');
        }
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $client = new Client();
        $url = "http://127.0.0.1:8000/api/jurusan/$id";
        $response = $client->request('GET', $url);
        $content = $response->getBody()->getContents();
        $contentArray = json_decode($content, true);
       if($contentArray['status']!=true){
        echo "Data tidak ditemukan";
       } else {
        $jurusan = $contentArray['data'];
        $ptk = Pegawai::select('id', 'nama')->get();
        return view('admin.pages.jurusan.edit', [
            'jurusan' => $jurusan,
            'ptk' => $ptk
        ]);
       }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $nama_jur = $request->nama_jur;
        $id_ptk_kakom = $request->id_ptk_kakom;
        $parameter = [
            'nama_jur'=>$nama_jur,
            'id_ptk_kakom'=>$id_ptk_kakom
        ];

        $client = new Client();
        $url = "http://127.0.0.1:8000/api/jurusan/$id";
        $response = $client->request('PUT', $url, [
            'headers'=>['Content-type'=>'application/json'],
            'body'=>json_encode($parameter)
        ]);
        $content = $response->getBody()->getContents();
        $contentArray = json_decode($content, true);
        if($contentArray['status']!= true) {
            $error = $contentArray['data'];
            return redirect()->back()->withErrors($error)->withInput();
        }else{
            return redirect()->to('admin/jurusan')->with('success','Berhasil mengupdate data');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $client = new Client();
        $url = "http://127.0.0.1:8000/api/jurusan/$id";
        $response = $client->request('DELETE', $url);
        $content = $response->getBody()->getContents();
        $contentArray = json_decode($content, true);
        if($contentArray['status']!= true) {
            $error = $contentArray['data'];
            return redirect()->back()->withErrors($error)->withInput();
        }else{
            return redirect()->to('admin/jurusan')->with('success','Berhasil menghapus data');
        }
    }
}
