<?php

namespace App\Http\Controllers\Admin;

use GuzzleHttp\Client;
use App\Models\Prgbantuan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PrgbantuanController extends Controller
{
    public function index() {
        $client = new Client();
        $url = 'http://127.0.0.1:8000/api/prgbantuan';
        $response = $client->request('GET', $url);
        $content = $response->getBody()->getContents();
        $contentArray = json_decode($content, true);
        $prgbantuan = $contentArray['data'];
        return view('admin.pages.prgbantuan.index', ['prgbantuan'=>$prgbantuan]);
    }

    //method halaman create 
    public function create() {
        return view('admin.pages.prgbantuan.create');
    }

    //method fungsi tambah data
    public function store(Request $request) {
        $prgbantuan = $request->prgbantuan;
        $parameter = [
            'prgbantuan'=>$prgbantuan,
        ];

        $client = new Client();
        $url = 'http://127.0.0.1:8000/api/prgbantuan';
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
            return redirect()->to('admin/prgbantuan')->with('success','Berhasil memasukan data');
        }
    }

    //method halaman edit
    public function edit(Request $request,$id) {
        $client = new Client();
        $url = "http://127.0.0.1:8000/api/prgbantuan/$id";
        $response = $client->request('GET', $url);
        $content = $response->getBody()->getContents();
        $contentArray = json_decode($content, true);
       if($contentArray['status']!=true){
        echo "Data tidak ditemukan";
       } else {
        $prgbantuan = $contentArray['data'];
        return view('admin.pages.prgbantuan.edit', [
            'prgbantuan' => $prgbantuan,
        ]);
       }
    }

    //method fungsi edit data
    public function update(Request $request,$id) {
        $prgbantuan = $request->prgbantuan;
        $parameter = [
            'prgbantuan'=>$prgbantuan,
        ];

        $client = new Client();
        $url = "http://127.0.0.1:8000/api/prgbantuan/$id";
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
            return redirect()->to('admin/prgbantuan')->with('success','Berhasil mengupdate data');
        }
    }

    //method fungsi hapus data
    public function destroy($id) {
        $client = new Client();
        $url = "http://127.0.0.1:8000/api/prgbantuan/$id";
        $response = $client->request('DELETE', $url);
        $content = $response->getBody()->getContents();
        $contentArray = json_decode($content, true);
        if($contentArray['status']!= true) {
            $error = $contentArray['data'];
            return redirect()->back()->withErrors($error)->withInput();
        }else{
            return redirect()->to('admin/prgbantuan')->with('success','Berhasil menghapus data');
        }
    }
}
