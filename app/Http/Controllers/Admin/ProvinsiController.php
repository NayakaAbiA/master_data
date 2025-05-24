<?php

namespace App\Http\Controllers\Admin;

use GuzzleHttp\Client;
use App\Models\Provinsi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Imports\ProvinsiImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Validators\ValidationException;

class ProvinsiController extends Controller
{
    public function index() {
        $client = new Client();
        $url = 'http://127.0.0.1:8000/api/provinsi';
        $response = $client->request('GET', $url);
        $content = $response->getBody()->getContents();
        $contentArray = json_decode($content, true);
        $provinsi = $contentArray['data'];
        return view('admin.pages.provinsi.index', ['provinsi'=>$provinsi]);
    }

    //method halaman create 
    public function create() {
        return view('admin.pages.provinsi.create');
    }

    //method fungsi tambah data
    public function store(Request $request) {
        $provinsi = $request->provinsi;
        $ibu_kota = $request->ibu_kota;
        $p_bsni = $request->p_bsni;
        $parameter = [
            'provinsi'=>$provinsi,
            'ibu_kota'=>$ibu_kota,
            'p_bsni'=>$p_bsni,
        ];

        $client = new Client();
        $url = 'http://127.0.0.1:8000/api/provinsi';
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
            return redirect()->to('admin/provinsi')->with('success','Berhasil memasukan data');
        }
    }

    //method halaman edit
    public function edit(Request $request,$id) {
        $client = new Client();
        $url = "http://127.0.0.1:8000/api/provinsi/$id";
        $response = $client->request('GET', $url);
        $content = $response->getBody()->getContents();
        $contentArray = json_decode($content, true);
       if($contentArray['status']!=true){
        echo "Data tidak ditemukan";
       } else {
        $provinsi = $contentArray['data'];
        return view('admin.pages.provinsi.edit', [
            'provinsi' => $provinsi,
        ]);
       }
    }

    //method fungsi edit data
    public function update(Request $request,$id) {
        $provinsi = $request->provinsi;
        $ibu_kota = $request->ibu_kota;
        $p_bsni = $request->p_bsni;
        $parameter = [
            'provinsi'=>$provinsi,
            'ibu_kota'=>$ibu_kota,
            'p_bsni'=>$p_bsni,
        ];

        $client = new Client();
        $url = "http://127.0.0.1:8000/api/provinsi/$id";
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
            return redirect()->to('admin/provinsi')->with('success','Berhasil mengupdate data');
        }
    }

    //method fungsi hapus data
    public function destroy($id) {
        $client = new Client();
        $url = "http://127.0.0.1:8000/api/provinsi/$id";
        $response = $client->request('DELETE', $url);
        $content = $response->getBody()->getContents();
        $contentArray = json_decode($content, true);
        if($contentArray['status']!= true) {
            $error = $contentArray['data'];
            return redirect()->back()->withErrors($error)->withInput();
        }else{
            return redirect()->to('admin/provinsi')->with('success','Berhasil menghapus data');
        }
    }

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xls,xlsx'
        ]);

        $import = new ProvinsiImport;

        try {
            $file = $request->file('file')->store('temp');
            Excel::import($import, storage_path('app/' . $file));
            Storage::delete($file);
        } catch (\Throwable $e) {
            return redirect()->back()->with('error', 'Gagal impor: ' . $e->getMessage());
        }

        // Ambil error yang dikumpulkan oleh SkipsFailures
        $failures = $import->failures();

        if ($failures->isNotEmpty()) {
            return redirect()->back()->with([
                'error' => 'Terdapat kesalahan pada beberapa baris Excel.',
                'failures' => $failures,
            ]);
        }

        return redirect()->route('admin.provinsi.index')->with('success', 'Data provinsi berhasil diimpor');
    }

    public function downloadTemplate()
    {
        return Excel::download(new \App\Exports\ProvinsiTemplateExport, 'Template_Provinsi.xlsx');
    }
}
