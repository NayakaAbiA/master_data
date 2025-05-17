<?php

namespace App\Http\Controllers\Admin;

use GuzzleHttp\Client;
use App\Models\Kabupaten;
use App\Models\Kecamatan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class KecamatanController extends Controller
{
    public function index() {
        $client = new Client();
        $url = 'http://127.0.0.1:8000/api/kecamatan';
        $response = $client->request('GET', $url);
        $content = $response->getBody()->getContents();
        $contentArray = json_decode($content, true);
        $kecamatan = $contentArray['data'];
        return view('admin.pages.kecamatan.index', ['kecamatan'=>$kecamatan]);
    }

    //method halaman create 
    public function create() {
        return view('admin.pages.kecamatan.create', ['kabupaten' => Kabupaten::get()]); //tambah untuk panggil fungsi 'kabupaten' dan ambil dari model
    }

    //method fungsi tambah data
    public function store(Request $request) {
        $kecamatan = $request->kecamatan;
        $id_kabupaten = $request->id_kabupaten;
        $parameter = [
            'kecamatan'=>$kecamatan,
            'id_kabupaten'=>$id_kabupaten,
        ];

        $client = new Client();
        $url = 'http://127.0.0.1:8000/api/kecamatan';
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
            return redirect()->to('admin/kecamatan')->with('success','Berhasil memasukan data');
        }
    }

    //method halaman edit
    public function edit(Request $request,$id) {
        $client = new Client();
        $url = "http://127.0.0.1:8000/api/kecamatan/$id";
        $response = $client->request('GET', $url);
        $content = $response->getBody()->getContents();
        $contentArray = json_decode($content, true);
        $kabupaten = Kabupaten::all();
       if($contentArray['status']!=true){
        echo "Data tidak ditemukan";
       } else {
        $kecamatan = $contentArray['data'];
        return view('admin.pages.kecamatan.edit', [
            'kecamatan' => $kecamatan,
            'kabupaten'=>$kabupaten
        ]);
       }
    }

    //method fungsi edit data
    public function update(Request $request,$id) {
        $kecamatan = $request->kecamatan;
        $id_kabupaten = $request->id_kabupaten;
        $parameter = [
            'kecamatan'=>$kecamatan,
            'id_kabupaten'=>$id_kabupaten,
        ];

        $client = new Client();
        $url = "http://127.0.0.1:8000/api/kecamatan/$id";
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
            return redirect()->to('admin/kecamatan')->with('success','Berhasil mengupdate data');
        }
    }

    //method fungsi hapus data
    public function destroy($id) {
        $client = new Client();
        $url = "http://127.0.0.1:8000/api/kecamatan/$id";
        $response = $client->request('DELETE', $url);
        $content = $response->getBody()->getContents();
        $contentArray = json_decode($content, true);
        if($contentArray['status']!= true) {
            $error = $contentArray['data'];
            return redirect()->back()->withErrors($error)->withInput();
        }else{
            return redirect()->to('admin/kecamatan')->with('success','Berhasil menghapus data');
        }
    }
}
