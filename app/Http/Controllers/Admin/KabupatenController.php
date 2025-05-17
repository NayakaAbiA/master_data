<?php

namespace App\Http\Controllers\Admin;

use GuzzleHttp\Client;
use App\Models\Provinsi;
use App\Models\Kabupaten;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class KabupatenController extends Controller
{
    public function index() {
        $client = new Client();
        $url = 'http://127.0.0.1:8000/api/kabupaten';
        $response = $client->request('GET', $url);
        $content = $response->getBody()->getContents();
        $contentArray = json_decode($content, true);
        $kabupaten = $contentArray['data'];
        return view('admin.pages.kabupaten.index', ['kabupaten'=>$kabupaten]);
    }

    //method halaman create 
    public function create() {
        return view('admin.pages.kabupaten.create', ['provinsi' => Provinsi::get()]); //tambah untuk panggil fungsi 'provinsi' dan ambil dari model
    }

    //method fungsi tambah data
    public function store(Request $request) {
        $kabupaten = $request->kabupaten;
        $ibu_kota = $request->ibu_kota;
        $k_bsni = $request->k_bsni;
        $id_provinsi = $request->id_provinsi;
        $parameter = [
            'kabupaten'=>$kabupaten,
            'ibu_kota'=>$ibu_kota,
            'k_bsni'=>$k_bsni,
            'id_provinsi'=>$id_provinsi
        ];

        $client = new Client();
        $url = 'http://127.0.0.1:8000/api/kabupaten';
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
            return redirect()->to('admin/kabupaten')->with('success','Berhasil memasukan data');
        }
    }

    //method halaman edit
    public function edit(Request $request,$id) {
        $client = new Client();
        $url = "http://127.0.0.1:8000/api/kabupaten/$id";
        $response = $client->request('GET', $url);
        $content = $response->getBody()->getContents();
        $contentArray = json_decode($content, true);
       if($contentArray['status']!=true){
        echo "Data tidak ditemukan";
       } else {
        $kabupaten = $contentArray['data'];
        $provinsi = Provinsi::select('id', 'provinsi')->get();
        return view('admin.pages.kabupaten.edit', [
            'kabupaten' => $kabupaten,
            'provinsi' => $provinsi
        ]);
       }
    }

    //method fungsi edit data
    public function update(Request $request,$id) {
        $kabupaten = $request->kabupaten;
        $ibu_kota = $request->ibu_kota;
        $k_bsni = $request->k_bsni;
        $id_provinsi = $request->id_provinsi;
        $parameter = [
            'kabupaten'=>$kabupaten,
            'ibu_kota'=>$ibu_kota,
            'k_bsni'=>$k_bsni,
            'id_provinsi'=>$id_provinsi
        ];

        $client = new Client();
        $url = "http://127.0.0.1:8000/api/kabupaten/$id";
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
            return redirect()->to('admin/kabupaten')->with('success','Berhasil mengupdate data');
        }
    }

    //method fungsi hapus data
    public function destroy($id) {
        $client = new Client();
        $url = "http://127.0.0.1:8000/api/kabupaten/$id";
        $response = $client->request('DELETE', $url);
        $content = $response->getBody()->getContents();
        $contentArray = json_decode($content, true);
        if($contentArray['status']!= true) {
            $error = $contentArray['data'];
            return redirect()->back()->withErrors($error)->withInput();
        }else{
            return redirect()->to('admin/kabupaten')->with('success','Berhasil menghapus data');
        }
    }
}
