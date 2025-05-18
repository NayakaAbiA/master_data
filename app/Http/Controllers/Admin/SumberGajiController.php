<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SumberGaji;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class SumberGajiController extends Controller
{
    public function index() {
        $client = new Client();
        $url = 'http://127.0.0.1:8000/api/sumbergaji';
        $response = $client->request('GET', $url);
        $content = $response->getBody()->getContents();
        $contentArray = json_decode($content, true);
        $sumbergaji = $contentArray['data'];
        return view('admin.pages.sumber_gaji.index', ['sumbergaji'=>$sumbergaji]);
    }

    //method halaman create 
    public function create() {
        return view('admin.pages.sumber_gaji.create');
    }

    //method fungsi tambah data
    public function store(Request $request) {
        $sumbergaji = $request->sumber_gaji;

        $parameter = [
            'sumber_gaji'=>$sumbergaji
        ];

        $client = new Client();
        $url = 'http://127.0.0.1:8000/api/sumbergaji';
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
            return redirect()->to('admin/sumbergaji')->with('success','Berhasil memasukan data');
        }
    }

    //method halaman edit
    public function edit(Request $request,$id) {
        $client = new Client();
        $url = "http://127.0.0.1:8000/api/sumbergaji/$id";
        $response = $client->request('GET', $url);
        $content = $response->getBody()->getContents();
        $contentArray = json_decode($content, true);
       if($contentArray['status']!=true){
        echo "Data tidak ditemukan";
       } else {
        $sumbergaji = $contentArray['data'];
        return view('admin.pages.sumber_gaji.edit', ['sumbergaji'=>$sumbergaji]);
       }
    }

    //method fungsi edit data
    public function update(Request $request,$id) {
        $sumbergaji = $request->sumber_gaji;

        $parameter = [
            'sumber_gaji'=>$sumbergaji
        ];

        $client = new Client();
        $url = "http://127.0.0.1:8000/api/sumbergaji/$id";
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
            return redirect()->to('admin/sumbergaji')->with('success','Berhasil mengupdate data');
        }
    }

    //method fungsi hapus data
    public function destroy($id) {
        $client = new Client();
        $url = "http://127.0.0.1:8000/api/sumbergaji/$id";
        $response = $client->request('DELETE', $url);
        $content = $response->getBody()->getContents();
        $contentArray = json_decode($content, true);
        if($contentArray['status']!= true) {
            $error = $contentArray['data'];
            return redirect()->back()->withErrors($error)->withInput();
        }else{
            return redirect()->to('admin/sumbergaji')->with('success','Berhasil menghapus data');
        }
    }
}
