<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Transportasi;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class TransportasiController extends Controller
{
    public function index() {
        $client = new Client();
        $url = 'http://127.0.0.1:8000/api/transportasi';
        $response = $client->request('GET', $url);
        $content = $response->getBody()->getContents();
        $contentArray = json_decode($content, true);
        $transportasi = $contentArray['data'];
        return view('admin.pages.transportasi.index', ['transportasi'=>$transportasi]);
    }

    //method halaman create 
    public function create() {
        return view('admin.pages.transportasi.create');
    }

    //method fungsi tambah data
    public function store(Request $request) {
        $transportasi = $request->alat_transport;

        $parameter = [
            'alat_transport'=>$transportasi
        ];

        $client = new Client();
        $url = 'http://127.0.0.1:8000/api/transportasi';
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
            return redirect()->to('admin/transportasi')->with('success','Berhasil memasukan data');
        }
    }

    //method halaman edit
    public function edit(Request $request,$id) {
        $client = new Client();
        $url = "http://127.0.0.1:8000/api/transportasi/$id";
        $response = $client->request('GET', $url);
        $content = $response->getBody()->getContents();
        $contentArray = json_decode($content, true);
       if($contentArray['status']!=true){
        echo "Data tidak ditemukan";
       } else {
        $transportasi = $contentArray['data'];
        return view('admin.pages.transportasi.edit', ['transportasi'=>$transportasi]);
       }
    }

    //method fungsi edit data
    public function update(Request $request,$id) {
        $transportasi = $request->alat_transport;

        $parameter = [
            'alat_transport'=>$transportasi
        ];

        $client = new Client();
        $url = "http://127.0.0.1:8000/api/transportasi/$id";
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
            return redirect()->to('admin/transportasi')->with('success','Berhasil mengupdate data');
        }
    }

    //method fungsi hapus data
    public function destroy($id) {
        $client = new Client();
        $url = "http://127.0.0.1:8000/api/transportasi/$id";
        $response = $client->request('DELETE', $url);
        $content = $response->getBody()->getContents();
        $contentArray = json_decode($content, true);
        if($contentArray['status']!= true) {
            $error = $contentArray['data'];
            return redirect()->back()->withErrors($error)->withInput();
        }else{
            return redirect()->to('admin/transportasi')->with('success','Berhasil menghapus data');
        }
    }
}
