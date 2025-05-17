<?php

namespace App\Http\Controllers\Admin;

use GuzzleHttp\Client;
use App\Models\JenisTinggal;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class JenisTinggalController extends Controller
{
    //method halaman index 
    public function index() {
        $client = new Client();
        $url = 'http://127.0.0.1:8000/api/jnstinggal';
        $response = $client->request('GET', $url);
        $content = $response->getBody()->getContents();
        $contentArray = json_decode($content, true);
        $jenistggl = $contentArray['data'];
        return view('admin.pages.jenis_tinggal.index', ['jenistggl'=>$jenistggl]);
    }

    //method halaman create 
    public function create() {
        return view('admin.pages.jenis_tinggal.create');
    }

    //method fungsi tambah data
    public function store(Request $request) {
        $jnstinggal = $request->jnstinggal;
        $parameter = [
            'jnstinggal'=>$jnstinggal
        ];

        $client = new Client();
        $url = 'http://127.0.0.1:8000/api/jnstinggal';
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
            return redirect()->to('admin/jenistggl')->with('success','Berhasil memasukan data');
        }
    }

    //method halaman edit
    public function edit(Request $request,$id) {
        $client = new Client();
        $url = "http://127.0.0.1:8000/api/jnstinggal/$id";
        $response = $client->request('GET', $url);
        $content = $response->getBody()->getContents();
        $contentArray = json_decode($content, true);
       if($contentArray['status']!=true){
        echo "Data tidak ditemukan";
       } else {
        $jenistggl = $contentArray['data'];
        return view('admin.pages.jenis_tinggal.edit', ['jenistggl'=>$jenistggl]);
       }
    }

    //method fungsi edit data
    public function update(Request $request,$id) {
        $jnstinggal = $request->jnstinggal;
        $parameter = [
            'jnstinggal'=>$jnstinggal
        ];

        $client = new Client();
        $url = "http://127.0.0.1:8000/api/jnstinggal/$id";
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
            return redirect()->to('admin/jenistggl')->with('success','Berhasil mengupdate data');
        }
    }

    //method fungsi hapus data
    public function destroy($id) {
        $client = new Client();
        $url = "http://127.0.0.1:8000/api/jnstinggal/$id";
        $response = $client->request('DELETE', $url);
        $content = $response->getBody()->getContents();
        $contentArray = json_decode($content, true);
        if($contentArray['status']!= true) {
            $error = $contentArray['data'];
            return redirect()->back()->withErrors($error)->withInput();
        }else{
            return redirect()->to('admin/jenistggl')->with('success','Berhasil menghapus data');
        }
    }
}
