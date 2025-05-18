<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TgsTambahan;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class TgsTambahanController extends Controller
{
    public function index() {
        $client = new Client();
        $url = 'http://127.0.0.1:8000/api/tgstambahan';
        $response = $client->request('GET', $url);
        $content = $response->getBody()->getContents();
        $contentArray = json_decode($content, true);
        $tgstambahan = $contentArray['data'];
        return view('admin.pages.tgs_tambahan.index', ['tgstambahan'=>$tgstambahan]);
    }

    //method halaman create 
    public function create() {
        return view('admin.pages.tgs_tambahan.create');
    }

    //method fungsi tambah data
    public function store(Request $request) {
        $tgstambahan = $request->tgs_tambahan;

        $parameter = [
            'tgs_tambahan'=>$tgstambahan
        ];

        $client = new Client();
        $url = 'http://127.0.0.1:8000/api/tgstambahan';
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
            return redirect()->to('admin/tgstambahan')->with('success','Berhasil memasukan data');
        }
    }

    //method halaman edit
    public function edit(Request $request,$id) {
        $client = new Client();
        $url = "http://127.0.0.1:8000/api/tgstambahan/$id";
        $response = $client->request('GET', $url);
        $content = $response->getBody()->getContents();
        $contentArray = json_decode($content, true);
       if($contentArray['status']!=true){
        echo "Data tidak ditemukan";
       } else {
        $tgstambahan = $contentArray['data'];
        return view('admin.pages.tgs_tambahan.edit', ['tgstambahan'=>$tgstambahan]);
       }
    }

    //method fungsi edit data
    public function update(Request $request,$id) {
        $tgstambahan = $request->tgs_tambahan;

        $parameter = [
            'tgs_tambahan'=>$tgstambahan
        ];

        $client = new Client();
        $url = "http://127.0.0.1:8000/api/tgstambahan/$id";
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
            return redirect()->to('admin/tgstambahan')->with('success','Berhasil mengupdate data');
        }
    }

    //method fungsi hapus data
    public function destroy($id) {
        $client = new Client();
        $url = "http://127.0.0.1:8000/api/tgstambahan/$id";
        $response = $client->request('DELETE', $url);
        $content = $response->getBody()->getContents();
        $contentArray = json_decode($content, true);
        if($contentArray['status']!= true) {
            $error = $contentArray['data'];
            return redirect()->back()->withErrors($error)->withInput();
        }else{
            return redirect()->to('admin/tgstambahan')->with('success','Berhasil menghapus data');
        }
    }
}
