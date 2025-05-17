<?php

namespace App\Http\Controllers\Admin;

use GuzzleHttp\Client;
use App\Models\KrtBantuan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class KrtBantuanController extends Controller
{
    public function index() {
        $client = new Client();
        $url = 'http://127.0.0.1:8000/api/krtbantuan';
        $response = $client->request('GET', $url);
        $content = $response->getBody()->getContents();
        $contentArray = json_decode($content, true);
        $krtbantuan = $contentArray['data'];
        return view('admin.pages.krtbantuan.index', ['krtbantuan'=>$krtbantuan]);
    }

    //method halaman create 
    public function create() {
        return view('admin.pages.krtbantuan.create');
    }

    //method fungsi tambah data
    public function store(Request $request) {
        $no_krtbantuan = $request->no_krtbantuan;
        $nama_krtbantuan = $request->nama_krtbantuan;
        $nama_pdkrt = $request->nama_pdkrt;
        $parameter = [
            'no_krtbantuan'=>$no_krtbantuan,
            'nama_krtbantuan'=>$nama_krtbantuan,
            'nama_pdkrt'=>$nama_pdkrt,
        ];

        $client = new Client();
        $url = 'http://127.0.0.1:8000/api/krtbantuan';
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
            return redirect()->to('admin/krtbantuan')->with('success','Berhasil memasukan data');
        }
    }

    //method halaman edit
    public function edit(Request $request,$id) {
        $client = new Client();
        $url = "http://127.0.0.1:8000/api/krtbantuan/$id";
        $response = $client->request('GET', $url);
        $content = $response->getBody()->getContents();
        $contentArray = json_decode($content, true);
       if($contentArray['status']!=true){
        echo "Data tidak ditemukan";
       } else {
        $krtbantuan = $contentArray['data'];
        return view('admin.pages.krtbantuan.edit', [
            'krtbantuan' => $krtbantuan,
        ]);
       }
    }

    //method fungsi edit data
    public function update(Request $request,$id) {
        $no_krtbantuan = $request->no_krtbantuan;
        $nama_krtbantuan = $request->nama_krtbantuan;
        $nama_pdkrt = $request->nama_pdkrt;
        $parameter = [
            'no_krtbantuan'=>$no_krtbantuan,
            'nama_krtbantuan'=>$nama_krtbantuan,
            'nama_pdkrt'=>$nama_pdkrt,
        ];

        $client = new Client();
        $url = "http://127.0.0.1:8000/api/krtbantuan/$id";
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
            return redirect()->to('admin/krtbantuan')->with('success','Berhasil mengupdate data');
        }
    }

    //method fungsi hapus data
    public function destroy($id) {
        $client = new Client();
        $url = "http://127.0.0.1:8000/api/krtbantuan/$id";
        $response = $client->request('DELETE', $url);
        $content = $response->getBody()->getContents();
        $contentArray = json_decode($content, true);
        if($contentArray['status']!= true) {
            $error = $contentArray['data'];
            return redirect()->back()->withErrors($error)->withInput();
        }else{
            return redirect()->to('admin/krtbantuan')->with('success','Berhasil menghapus data');
        }
    }
}


