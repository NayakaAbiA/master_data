<?php

namespace App\Http\Controllers\Admin;

use GuzzleHttp\Client;
use App\Models\KebKhusus;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class KebKhususController extends Controller
{
    //method halaman index 
    public function index() {
        $client = new Client();
        $url = 'http://127.0.0.1:8000/api/kebkhusus';
        $response = $client->request('GET', $url);
        $content = $response->getBody()->getContents();
        $contentArray = json_decode($content, true);
        $kebkhusus = $contentArray['data'];
        return view('admin.pages.kebkhusus.index', ['kebkhusus'=>$kebkhusus]);
    }

    //method halaman create 
    public function create() {
        return view('admin.pages.kebkhusus.create');
    }

    //method fungsi tambah data
    public function store(Request $request) {
        $kebkhusus = $request->kebkhusus;
        $parameter = [
            'kebkhusus'=>$kebkhusus,
        ];

        $client = new Client();
        $url = 'http://127.0.0.1:8000/api/kebkhusus';
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
            return redirect()->to('admin/kebkhusus')->with('success','Berhasil memasukan data');
        }
    }

    //method halaman edit
    public function edit(Request $request,$id) {
        $client = new Client();
        $url = "http://127.0.0.1:8000/api/kebkhusus/$id";
        $response = $client->request('GET', $url);
        $content = $response->getBody()->getContents();
        $contentArray = json_decode($content, true);
       if($contentArray['status']!=true){
        echo "Data tidak ditemukan";
       } else {
        $kebkhusus = $contentArray['data'];
        return view('admin.pages.kebkhusus.edit', [
            'kebkhusus' => $kebkhusus,
        ]);
       }
    }

    //method fungsi edit data
    public function update(Request $request,$id) {
        $kebkhusus = $request->kebkhusus;
        $parameter = [
            'kebkhusus'=>$kebkhusus,
        ];

        $client = new Client();
        $url = "http://127.0.0.1:8000/api/kebkhusus/$id";
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
            return redirect()->to('admin/kebkhusus')->with('success','Berhasil mengupdate data');
        }
    }

    //method fungsi hapus data
    public function destroy($id) {
        $client = new Client();
        $url = "http://127.0.0.1:8000/api/kebkhusus/$id";
        $response = $client->request('DELETE', $url);
        $content = $response->getBody()->getContents();
        $contentArray = json_decode($content, true);
        if($contentArray['status']!= true) {
            $error = $contentArray['data'];
            return redirect()->back()->withErrors($error)->withInput();
        }else{
            return redirect()->to('admin/kebkhusus')->with('success','Berhasil menghapus data');
        }
    }
}
