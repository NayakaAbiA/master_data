<?php

namespace App\Http\Controllers\Admin;

use GuzzleHttp\Client;
use App\Models\Pendidikan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PendidikanController extends Controller
{
    public function index() {
        $client = new Client();
        $url = 'http://127.0.0.1:8000/api/pendidikan';
        $response = $client->request('GET', $url);
        $content = $response->getBody()->getContents();
        $contentArray = json_decode($content, true);
        $pendidikan = $contentArray['data'];
        return view('admin.pages.pendidikan.index', ['pendidikan'=>$pendidikan]);
    }

    //method halaman create 
    public function create() {
        return view('admin.pages.pendidikan.create');
    }

    //method fungsi tambah data
    public function store(Request $request) {
        $pendidikan = $request->jenjang_pendidikan;
        $parameter = [
            'jenjang_pendidikan'=>$pendidikan,
        ];

        $client = new Client();
        $url = 'http://127.0.0.1:8000/api/pendidikan';
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
            return redirect()->to('admin/pendidikan')->with('success','Berhasil memasukan data');
        }
    }

    //method halaman edit
    public function edit(Request $request,$id) {
        $client = new Client();
        $url = "http://127.0.0.1:8000/api/pendidikan/$id";
        $response = $client->request('GET', $url);
        $content = $response->getBody()->getContents();
        $contentArray = json_decode($content, true);
       if($contentArray['status']!=true){
        echo "Data tidak ditemukan";
       } else {
        $pendidikan = $contentArray['data'];
        return view('admin.pages.pendidikan.edit', [
            'pendidikan' => $pendidikan,
        ]);
       }
    }

    //method fungsi edit data
    public function update(Request $request,$id) {
        $pendidikan = $request->jenjang_pendidikan;
        $parameter = [
            'jenjang_pendidikan'=>$pendidikan,
        ];

        $client = new Client();
        $url = "http://127.0.0.1:8000/api/pendidikan/$id";
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
            return redirect()->to('admin/pendidikan')->with('success','Berhasil mengupdate data');
        }
    }

    //method fungsi hapus data
    public function destroy($id) {
        $client = new Client();
        $url = "http://127.0.0.1:8000/api/pendidikan/$id";
        $response = $client->request('DELETE', $url);
        $content = $response->getBody()->getContents();
        $contentArray = json_decode($content, true);
        if($contentArray['status']!= true) {
            $error = $contentArray['data'];
            return redirect()->back()->withErrors($error)->withInput();
        }else{
            return redirect()->to('admin/pendidikan')->with('success','Berhasil menghapus data');
        }
    }
}
