<?php

namespace App\Http\Controllers\Admin;

use GuzzleHttp\Client;
use App\Models\JenisPTK;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class JenisPTKController extends Controller
{
    //method halaman index 
    public function index() {
        $client = new Client();
        $url = 'http://127.0.0.1:8000/api/jenisptk';
        $response = $client->request('GET', $url);
        $content = $response->getBody()->getContents();
        $contentArray = json_decode($content, true);
        $jenisptk = $contentArray['data'];
        return view('admin.pages.jenis_ptk.index', ['jenisptk'=>$jenisptk]);
    }

    //method halaman create 
    public function create() {
        return view('admin.pages.jenis_ptk.create');
    }

    //method fungsi tambah data
    public function store(Request $request) {
        $jenisptk = $request->jenis_ptk;
        $parameter = [
            'jenis_ptk'=>$jenisptk
        ];

        $client = new Client();
        $url = 'http://127.0.0.1:8000/api/jenisptk';
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
            return redirect()->to('admin/jenisptk')->with('success','Berhasil memasukan data');
        }
    }

    //method halaman edit
    public function edit(Request $request,$id) {
        $client = new Client();
        $url = "http://127.0.0.1:8000/api/jenisptk/$id";
        $response = $client->request('GET', $url);
        $content = $response->getBody()->getContents();
        $contentArray = json_decode($content, true);
       if($contentArray['status']!=true){
        echo "Data tidak ditemukan";
       } else {
        $jenisptk = $contentArray['data'];
        return view('admin.pages.jenis_ptk.edit', ['jenisptk'=>$jenisptk]);
       }
    }

    //method fungsi edit data
    public function update(Request $request,$id) {
        $jenisptk = $request->jenis_ptk;
        $parameter = [
            'jenis_ptk'=>$jenisptk
        ];

        $client = new Client();
        $url = "http://127.0.0.1:8000/api/jenisptk/$id";
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
            return redirect()->to('admin/jenisptk')->with('success','Berhasil mengupdate data');
        }
    }

    //method fungsi hapus data
    public function destroy($id) {
        $client = new Client();
        $url = "http://127.0.0.1:8000/api/jenisptk/$id";
        $response = $client->request('DELETE', $url);
        $content = $response->getBody()->getContents();
        $contentArray = json_decode($content, true);
        if($contentArray['status']!= true) {
            $error = $contentArray['data'];
            return redirect()->back()->withErrors($error)->withInput();
        }else{
            return redirect()->to('admin/jenisptk')->with('success','Berhasil menghapus data');
        }
    }
}
