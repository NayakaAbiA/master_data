<?php

namespace App\Http\Controllers\Admin;

use GuzzleHttp\Client;
use App\Models\Kecamatan;
use App\Models\Kelurahan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Imports\KelurahanImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Validators\ValidationException;

class KelurahanController extends Controller
{
    public function index() {
        $client = new Client();
        $url = 'http://127.0.0.1:8000/api/kelurahan';
        $response = $client->request('GET', $url);
        $content = $response->getBody()->getContents();
        $contentArray = json_decode($content, true);
        $kelurahan = $contentArray['data'];
        return view('admin.pages.kelurahan.index', ['kelurahan'=>$kelurahan]);
    }

    //method halaman create 
    public function create() {
        return view('admin.pages.kelurahan.create', ['kecamatan' => Kecamatan::get()]); //tambah untuk panggil fungsi 'kecamatan' dan ambil dari model
    }

    //method fungsi tambah data
    public function store(Request $request) {
        $kelurahan = $request->kelurahan;
        $kode_pos = $request->kode_pos;
        $id_kecamatan = $request->id_kecamatan;
        $parameter = [
            'kelurahan'=>$kelurahan,
            'kode_pos'=>$kode_pos,
            'id_kecamatan'=>$id_kecamatan,
        ];

        $client = new Client();
        $url = 'http://127.0.0.1:8000/api/kelurahan';
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
            return redirect()->to('admin/kelurahan')->with('success','Berhasil memasukan data');
        }
    }

    //method halaman edit
    public function edit(Request $request,$id) {
        $client = new Client();
        $url = "http://127.0.0.1:8000/api/kelurahan/$id";
        $response = $client->request('GET', $url);
        $content = $response->getBody()->getContents();
        $contentArray = json_decode($content, true);
        $kecamatan = Kecamatan::get();
       if($contentArray['status']!=true){
        echo "Data tidak ditemukan";
       } else {
        $kelurahan = $contentArray['data'];
        return view('admin.pages.kelurahan.edit', [
            'kelurahan' => $kelurahan,
            'kecamatan'=> $kecamatan
        ]);
       }
    }

    //method fungsi edit data
    public function update(Request $request,$id) {
        $kelurahan = $request->kelurahan;
        $kode_pos = $request->kode_pos;
        $id_kecamatan = $request->id_kecamatan;
        $parameter = [
            'kelurahan'=>$kelurahan,
            'kode_pos'=>$kode_pos,
            'id_kecamatan'=>$id_kecamatan,
        ];

        $client = new Client();
        $url = "http://127.0.0.1:8000/api/kelurahan/$id";
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
            return redirect()->to('admin/kelurahan')->with('success','Berhasil mengupdate data');
        }
    }

    //method fungsi hapus data
    public function destroy($id) {
        $client = new Client();
        $url = "http://127.0.0.1:8000/api/kelurahan/$id";
        $response = $client->request('DELETE', $url);
        $content = $response->getBody()->getContents();
        $contentArray = json_decode($content, true);
        if($contentArray['status']!= true) {
            $error = $contentArray['data'];
            return redirect()->back()->withErrors($error)->withInput();
        }else{
            return redirect()->to('admin/kelurahan')->with('success','Berhasil menghapus data');
        }
    }

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xls,xlsx'
        ]);

        $import = new KelurahanImport;

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

        return redirect()->route('admin.kelurahan.index')->with('success', 'Data kelurahan berhasil diimpor');
    }

    public function downloadTemplate()
    {
        return Excel::download(new \App\Exports\KelurahanTemplateExport, 'Template_Kelurahan.xlsx');
    }
}
