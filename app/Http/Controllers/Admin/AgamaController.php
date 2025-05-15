<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Agama;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class AgamaController extends Controller
{
    public function index() {
       $client = new Client();
       $url = "http://127.0.0.1:8000/api/agama";
       $response = $client->request('GET',$url);
       $content = $response->getBody()->getContents();
       $contentArray = json_decode($content, true);
       $agama = $contentArray['data'];
       return view('admin.pages.agama.index', ['agama'=>$agama]);
     }

    //method halaman create 
    public function create() {
        return view('admin.pages.agama.create');
    }

    //method fungsi tambah data
    public function store(Request $request) {
        $nama_agama = $request->nama_agama;

        $parameter = [
            'nama_agama'=>$nama_agama
        ];

        $client = new Client();
        $url = "http://127.0.0.1:8000/api/agama";
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
            return redirect()->to('admin/agama')->with('success','Berhasil memasukan data');
        }
    }

    //method halaman edit
    public function edit(Request $request,$id) {
        $client = new Client();
        $url = "http://127.0.0.1:8000/api/agama/$id";
        $response = $client->request('GET',$url);
        $content = $response->getBody()->getContents();
        $contentArray = json_decode($content, true);
        if($contentArray['status']!=true){
            echo "Data tidak ditemukan";
        } else {
            $agama = $contentArray['data'];
            return view('admin.pages.agama.edit', ['agama'=>$agama]);
        }
    }

    //method fungsi edit data
    public function update(Request $request,$id) {
        $nama_agama = $request->nama_agama;

        $parameter = [
            'nama_agama'=>$nama_agama
        ];

        $client = new Client();
        $url = "http://127.0.0.1:8000/api/agama/$id";
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
            return redirect()->to('admin/agama')->with('success','Berhasil mengupdate data');
        }
    }

    //method fungsi hapus data
    public function destroy($id) {
        $client = new Client();
        $url = "http://127.0.0.1:8000/api/agama/$id";
        $response = $client->request('DELETE', $url);
        $content = $response->getBody()->getContents();
        $contentArray = json_decode($content, true);
        if($contentArray['status']!= true) {
            $error = $contentArray['data'];
            return redirect()->back()->withErrors($error)->withInput();
        }else{
            return redirect()->to('admin/agama')->with('success','Berhasil menghapus data');
        }
    }
}
