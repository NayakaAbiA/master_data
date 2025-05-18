<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\StatPegawai;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class StatusPegawaiController extends Controller
{
    public function index() {
        $client = new Client();
        $url = 'http://127.0.0.1:8000/api/statpegawai';
        $response = $client->request('GET', $url);
        $content = $response->getBody()->getContents();
        $contentArray = json_decode($content, true);
        $statpegawai = $contentArray['data'];
        return view('admin.pages.statuspegawai.index', ['statpegawai'=>$statpegawai]);
    }

    //method halaman create 
    public function create() {
        return view('admin.pages.statuspegawai.create');
    }

    //method fungsi tambah data
    public function store(Request $request) {
        $statpegawai = $request->stat_peg;

        $parameter = [
            'stat_peg'=>$statpegawai
        ];

        $client = new Client();
        $url = 'http://127.0.0.1:8000/api/statpegawai';
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
            return redirect()->to('admin/statpeg')->with('success','Berhasil memasukan data');
        }
    }

    //method halaman edit
    public function edit(Request $request,$id) {
        $client = new Client();
        $url = "http://127.0.0.1:8000/api/statpegawai/$id";
        $response = $client->request('GET', $url);
        $content = $response->getBody()->getContents();
        $contentArray = json_decode($content, true);
       if($contentArray['status']!=true){
        echo "Data tidak ditemukan";
       } else {
        $statpegawai = $contentArray['data'];
        return view('admin.pages.statuspegawai.edit', ['statpegawai'=>$statpegawai]);
       }
    }

    //method fungsi edit data
    public function update(Request $request,$id) {
        $statpegawai = $request->stat_peg;

        $parameter = [
            'stat_peg'=>$statpegawai
        ];

        $client = new Client();
        $url = "http://127.0.0.1:8000/api/statpegawai/$id";
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
            return redirect()->to('admin/statpeg')->with('success','Berhasil mengupdate data');
        }
    }

    //method fungsi hapus data
    public function destroy($id) {
        $client = new Client();
        $url = "http://127.0.0.1:8000/api/statpegawai/$id";
        $response = $client->request('DELETE', $url);
        $content = $response->getBody()->getContents();
        $contentArray = json_decode($content, true);
        if($contentArray['status']!= true) {
            $error = $contentArray['data'];
            return redirect()->back()->withErrors($error)->withInput();
        }else{
            return redirect()->to('admin/statpeg')->with('success','Berhasil menghapus data');
        }
    }
}
