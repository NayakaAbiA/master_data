<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\StatKawin;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use GuzzleHttp\Exception\RequestException;

class StatusKawinController extends Controller
{
    public function index() {
        $client = new Client();
        $url = 'http://127.0.0.1:8000/api/statkawin';
        $response = $client->request('GET', $url);
        $content = $response->getBody()->getContents();
        $contentArray = json_decode($content, true);
        $statkawin = $contentArray['data'];
        return view('admin.pages.statuskawin.index', ['statkawin'=>$statkawin]);
    }

    //method halaman create 
    public function create() {
        return view('admin.pages.statuskawin.create');
    }

    //method fungsi tambah data
    public function store(Request $request) {
        $statkawin = $request->status_kawin;

        $parameter = [
            'status_kawin'=>$statkawin
        ];

        $client = new Client();
        $url = 'http://127.0.0.1:8000/api/statkawin';
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
            return redirect()->to('admin/statkawin')->with('success','Berhasil memasukan data');
        }

    }

    //method halaman edit
    public function edit(Request $request,$id) {
        $client = new Client();
        $url = "http://127.0.0.1:8000/api/statkawin/$id";
        $response = $client->request('GET', $url);
        $content = $response->getBody()->getContents();
        $contentArray = json_decode($content, true);
       if($contentArray['status']!=true){
        echo "Data tidak ditemukan";
       } else {
        $statkawin = $contentArray['data'];
        return view('admin.pages.statuskawin.edit', ['statkawin'=>$statkawin]);
       }
    }

    //method fungsi edit data
    public function update(Request $request,$id) {
        $statkawin = $request->status_kawin;

        $parameter = [
            'status_kawin'=>$statkawin
        ];

        $client = new Client();
        $url = "http://127.0.0.1:8000/api/statkawin/$id";
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
            return redirect()->to('admin/statkawin')->with('success','Berhasil mengupdate data');
        }
    }

    //method fungsi hapus data
    public function destroy($id) {
        $client = new Client();
        $url = "http://127.0.0.1:8000/api/statkawin/$id";
        $response = $client->request('DELETE', $url);
        $content = $response->getBody()->getContents();
        $contentArray = json_decode($content, true);
        if($contentArray['status']!= true) {
            $error = $contentArray['data'];
            return redirect()->back()->withErrors($error)->withInput();
        }else{
            return redirect()->to('admin/statkawin')->with('success','Berhasil menghapus data');
        }
    }
}
