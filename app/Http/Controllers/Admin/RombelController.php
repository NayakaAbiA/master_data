<?php

namespace App\Http\Controllers\Admin;

use App\Models\Rombel;
use GuzzleHttp\Client;
use App\Models\Pegawai;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Imports\RombelImport;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Validators\ValidationException;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class RombelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $client = new Client();
        $url = 'http://127.0.0.1:8000/api/rombel';
        $response = $client->request('GET', $url);
        $content = $response->getBody()->getContents();
        $contentArray = json_decode($content, true);
        $rombel = $contentArray['data'];
        return view('admin.pages.rombel.index', ['rombel'=>$rombel]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $ptk_walas = Pegawai::all();
        return view('Admin.pages.rombel.create', compact('ptk_walas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $nama_rombel = $request->nama_rombel;
        $id_ptk_walas = $request->id_ptk_walas;

        $parameter = [
            'nama_rombel'=>$nama_rombel,
            'id_ptk_walas'=>$id_ptk_walas,
        ];

        $client = new Client();
        $url = 'http://127.0.0.1:8000/api/rombel';
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
            return redirect()->to('admin/rombel')->with('success','Berhasil memasukan data');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $client = new Client();
        $url = "http://127.0.0.1:8000/api/rombel/$id";
        $response = $client->request('GET', $url);
        $content = $response->getBody()->getContents();
        $contentArray = json_decode($content, true);
        $ptk_walas = Pegawai::all();
       if($contentArray['status']!=true){
        echo "Data tidak ditemukan";
       } else {
        $rombel = $contentArray['data'];
        return view('admin.pages.rombel.edit', [
            'rombel' => $rombel,
            'ptk_walas' => $ptk_walas,
        ]);
       }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $nama_rombel = $request->nama_rombel;
        $id_ptk_walas = $request->id_ptk_walas;

        $parameter = [
            'nama_rombel'=>$nama_rombel,
            'id_ptk_walas'=>$id_ptk_walas,
        ];

        $client = new Client();
        $url = "http://127.0.0.1:8000/api/rombel/$id";
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
            return redirect()->to('admin/rombel')->with('success','Berhasil mengupdate data');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $client = new Client();
        $url = "http://127.0.0.1:8000/api/rombel/$id";
        $response = $client->request('DELETE', $url);
        $content = $response->getBody()->getContents();
        $contentArray = json_decode($content, true);
        if($contentArray['status']!= true) {
            $error = $contentArray['data'];
            return redirect()->back()->withErrors($error)->withInput();
        }else{
            return redirect()->to('admin/rombel')->with('success','Berhasil menghapus data');
        }
    }

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xls,xlsx'
        ]);
    
        $import = new RombelImport;
    
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
    
        return redirect()->route('admin.rombel.index')->with('success', 'Data rombel berhasil diimpor');
    }

    public function downloadTemplate()
    {
        return Excel::download(new \App\Exports\RombelTemplateExport, 'Template_Rombel.xlsx');
    }

}
