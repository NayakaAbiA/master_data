<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Bank;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class BankController extends Controller
{
    public function index() {
        $client = new Client();
        $url = 'http://127.0.0.1:8000/api/bank';
        $response = $client->request('GET', $url);
        $content = $response->getBody()->getContents();
        $contentArray = json_decode($content, true);
        $bank = $contentArray['data'];
        return view('admin.pages.bank.index', ['bank'=>$bank]);

    }

    //method halaman create 
    public function create() {
        return view('admin.pages.bank.create');
    }

    //method fungsi tambah data
    public function store(Request $request) {
        $nama_bank = $request->nama_bank;

        $parameter = [
            'nama_bank'=>$nama_bank
        ];

        $client = new Client();
        $url = 'http://127.0.0.1:8000/api/bank';
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
            return redirect()->to('admin/bank')->with('success','Berhasil memasukan data');
        }
        
    }

    //method halaman edit
    public function edit(Request $request,$id) {
        $client = new Client();
        $url = "http://127.0.0.1:8000/api/bank/$id";
        $response = $client->request('GET', $url);
        $content = $response->getBody()->getContents();
        $contentArray = json_decode($content, true);
       if($contentArray['status']!=true){
        echo "Data tidak ditemukan";
       } else {
        $bank = $contentArray['data'];
        return view('admin.pages.bank.edit', ['bank'=>$bank]);
       }
    }

    //method fungsi edit data
    public function update(Request $request,$id) {
        $nama_bank = $request->nama_bank;

        $parameter = [
            'nama_bank'=>$nama_bank
        ];

        $client = new Client();
        $url = "http://127.0.0.1:8000/api/bank/$id";
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
            return redirect()->to('admin/bank')->with('success','Berhasil mengupdate data');
        }
    }

    //method fungsi hapus data
    public function destroy($id) {
        $client = new Client();
        $url = "http://127.0.0.1:8000/api/bank/$id";
        $response = $client->request('DELETE', $url);
        $content = $response->getBody()->getContents();
        $contentArray = json_decode($content, true);
        if($contentArray['status']!= true) {
            $error = $contentArray['data'];
            return redirect()->back()->withErrors($error)->withInput();
        }else{
            return redirect()->to('admin/bank')->with('success','Berhasil menghapus data');
        }
    }
}


