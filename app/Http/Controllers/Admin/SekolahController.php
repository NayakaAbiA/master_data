<?php

namespace App\Http\Controllers\Admin;

use GuzzleHttp\Client;
use App\Models\Sekolah;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Imports\SekolahImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Validators\ValidationException;

class SekolahController extends Controller
{
    public function index() {
        $client = new Client();
        $url = 'http://127.0.0.1:8000/api/sekolah';
        $response = $client->request('GET', $url);
        $content = $response->getBody()->getContents();
        $contentArray = json_decode($content, true);
        $sekolah = $contentArray['data'];
        return view('admin.pages.sekolah.index', ['sekolah'=>$sekolah]);
    }

    //method halaman create 
    public function create() {
        return view('admin.pages.sekolah.create');
    }

    //method fungsi tambah data
    public function store(Request $request) {
        $npsn = $request->npsn;
        $nama_sekolah = $request->nama_sekolah;
        $jenjang = $request->jenjang;
        $parameter = [
            'npsn'=>$npsn,
            'nama_sekolah'=>$nama_sekolah,
            'jenjang'=>$jenjang,
        ];

        $client = new Client();
        $url = 'http://127.0.0.1:8000/api/sekolah';
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
            return redirect()->to('admin/sekolah')->with('success','Berhasil memasukan data');
        }
    }

    //method halaman edit
    public function edit(Request $request,$id) {
        $client = new Client();
        $url = "http://127.0.0.1:8000/api/sekolah/$id";
        $response = $client->request('GET', $url);
        $content = $response->getBody()->getContents();
        $contentArray = json_decode($content, true);
       if($contentArray['status']!=true){
        echo "Data tidak ditemukan";
       } else {
        $sekolah = $contentArray['data'];
        return view('admin.pages.sekolah.edit', [
            'sekolah' => $sekolah,
        ]);
       }
    }

    //method fungsi edit data
    public function update(Request $request,$id) {
        $npsn = $request->npsn;
        $nama_sekolah = $request->nama_sekolah;
        $jenjang = $request->jenjang;
        $parameter = [
            'npsn'=>$npsn,
            'nama_sekolah'=>$nama_sekolah,
            'jenjang'=>$jenjang,
        ];

        $client = new Client();
        $url = "http://127.0.0.1:8000/api/sekolah/$id";
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
            return redirect()->to('admin/sekolah')->with('success','Berhasil mengupdate data');
        }
    }

    //method fungsi hapus data
    public function destroy($id) {
        $client = new Client();
        $url = "http://127.0.0.1:8000/api/sekolah/$id";
        $response = $client->request('DELETE', $url);
        $content = $response->getBody()->getContents();
        $contentArray = json_decode($content, true);
        if($contentArray['status']!= true) {
            $error = $contentArray['data'];
            return redirect()->back()->withErrors($error)->withInput();
        }else{
            return redirect()->to('admin/sekolah')->with('success','Berhasil menghapus data');
        }
    }

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xls,xlsx'
        ]);

        $import = new SekolahImport;

        try {
            // Import langsung dari file upload, tidak perlu disimpan ke storage
            Excel::import($import, $request->file('file'));
        } catch (\Throwable $e) {
            return redirect()->back()->with('error', 'Gagal impor: ' . $e->getMessage());
        }
    
        $failures = $import->failures();
    
        if ($failures->isNotEmpty()) {
            return redirect()->back()->with([
                'error' => 'Terdapat kesalahan pada beberapa baris Excel.',
                'failures' => $failures,
            ]);
        }

        return redirect()->route('admin.sekolah.index')->with('success', 'Data Sekolah berhasil diimpor');
    }

    public function downloadTemplate()
    {
        return Excel::download(new \App\Exports\SekolahTemplateExport, 'Template_Sekolah.xlsx');
    }
}


