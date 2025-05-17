<?php

namespace App\Http\Controllers\Admin;

use GuzzleHttp\Client;
use App\Models\Penghasilan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PenghasilanController extends Controller
{
    public function index() {
        $client = new Client();
        $url = 'http://127.0.0.1:8000/api/penghasilan';
        $response = $client->request('GET', $url);
        $content = $response->getBody()->getContents();
        $contentArray = json_decode($content, true);
        $penghasilan = $contentArray['data'];
        return view('admin.pages.penghasilan.index', ['penghasilan'=>$penghasilan]);
    }

    //method halaman create 
    public function create() {
        return view('admin.pages.penghasilan.create');
    }

    //method fungsi tambah data
    public function store(Request $request) {
        $penghasilan = $request->penghasilan;
        $parameter = [
            'penghasilan'=>$penghasilan,
        ];

        $client = new Client();
        $url = 'http://127.0.0.1:8000/api/penghasilan';
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
            return redirect()->to('admin/penghasilan')->with('success','Berhasil memasukan data');
        }
    }

    //method halaman edit
    public function edit(Request $request,$id) {
        $client = new Client();
        $url = "http://127.0.0.1:8000/api/penghasilan/$id";
        $response = $client->request('GET', $url);
        $content = $response->getBody()->getContents();
        $contentArray = json_decode($content, true);
       if($contentArray['status']!=true){
        echo "Data tidak ditemukan";
       } else {
        $penghasilan = $contentArray['data'];
        return view('admin.pages.penghasilan.edit', [
            'penghasilan' => $penghasilan,
        ]);
       }
    }

    //method fungsi edit data
    public function update(Request $request,$id) {
        $penghasilan = $request->penghasilan;
        $parameter = [
            'penghasilan'=>$penghasilan,
        ];

        $client = new Client();
        $url = "http://127.0.0.1:8000/api/penghasilan/$id";
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
            return redirect()->to('admin/penghasilan')->with('success','Berhasil mengupdate data');
        }
    }

    //method fungsi hapus data
    public function destroy($id) {
        $client = new Client();
        $url = "http://127.0.0.1:8000/api/penghasilan/$id";
        $response = $client->request('DELETE', $url);
        $content = $response->getBody()->getContents();
        $contentArray = json_decode($content, true);
        if($contentArray['status']!= true) {
            $error = $contentArray['data'];
            return redirect()->back()->withErrors($error)->withInput();
        }else{
            return redirect()->to('admin/penghasilan')->with('success','Berhasil menghapus data');
        }
        return redirect()->route('admin.penghasilan.index')->with('error', 'Data gagal disimpan.');
    }
}
