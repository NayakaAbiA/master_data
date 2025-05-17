<?php

namespace App\Http\Controllers\Admin;

use GuzzleHttp\Client;
use App\Models\Pekerjaan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PekerjaanController extends Controller
{
    public function index() {
        $client = new Client();
        $url = 'http://127.0.0.1:8000/api/pekerjaan';
        $response = $client->request('GET', $url);
        $content = $response->getBody()->getContents();
        $contentArray = json_decode($content, true);
        $pekerjaan = $contentArray['data'];
        return view('admin.pages.pekerjaan.index', ['pekerjaan'=>$pekerjaan]);
    }

    //method halaman create 
    public function create() {
        return view('admin.pages.pekerjaan.create');
    }

    //method fungsi tambah data
    public function store(Request $request) {
        $pekerjaan = $request->pekerjaan;
        $parameter = [
            'pekerjaan'=>$pekerjaan,
        ];

        $client = new Client();
        $url = 'http://127.0.0.1:8000/api/pekerjaan';
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
            return redirect()->to('admin/pekerjaan')->with('success','Berhasil memasukan data');
        }
    }

    //method halaman edit
    public function edit(Request $request,$id) {
        $client = new Client();
        $url = "http://127.0.0.1:8000/api/pekerjaan/$id";
        $response = $client->request('GET', $url);
        $content = $response->getBody()->getContents();
        $contentArray = json_decode($content, true);
       if($contentArray['status']!=true){
        echo "Data tidak ditemukan";
       } else {
        $pekerjaan = $contentArray['data'];
        return view('admin.pages.pekerjaan.edit', [
            'pekerjaan' => $pekerjaan,
        ]);
       }
    }

    //method fungsi edit data
    public function update(Request $request,$id) {
        $pekerjaan = $request->pekerjaan;
        $parameter = [
            'pekerjaan'=>$pekerjaan,
        ];

        $client = new Client();
        $url = "http://127.0.0.1:8000/api/pekerjaan/$id";
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
            return redirect()->to('admin/pekerjaan')->with('success','Berhasil mengupdate data');
        }
    }

    //method fungsi hapus data
    public function destroy($id) {
        $client = new Client();
        $url = "http://127.0.0.1:8000/api/pekerjaan/$id";
        $response = $client->request('DELETE', $url);
        $content = $response->getBody()->getContents();
        $contentArray = json_decode($content, true);
        if($contentArray['status']!= true) {
            $error = $contentArray['data'];
            return redirect()->back()->withErrors($error)->withInput();
        }else{
            return redirect()->to('admin/pekerjaan')->with('success','Berhasil menghapus data');
        }
    }
}
