<?php

namespace App\Http\Controllers\Admin;

use App\Models\Bank;
use App\Models\Agama;
use App\Models\Rombel;
use GuzzleHttp\Client;
use App\Models\Pangkat;
use App\Models\Pegawai;
use App\Models\JenisPTK;
use App\Models\Provinsi;
use App\Models\Kabupaten;
use App\Models\Kecamatan;
use App\Models\Kelurahan;
use App\Models\Pekerjaan;
use App\Models\StatKawin;
use App\Models\SumberGaji;
use App\Models\StatPegawai;
use App\Models\TgsTambahan;
use App\Models\DokumenPTK;

use Illuminate\Http\Request;
use App\Exports\pegawaiExport;
use App\Imports\PegawaiImport;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Validators\ValidationException;

class PegawaiController extends Controller
{
      /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Pegawai::query();
        $role = Auth::user()->role->role;
        if (in_array($role, ['superAdmin', 'adminPegawai'])) {
            // Admin bisa lihat semua data, tanpa filter ptk_id
        } else {
            // User biasa hanya lihat data sendiri
            $query->where('id', Auth::user()->ptk_id);
        }

        // Tambahkan filter jika ada input dari request
        if ($request->filled('jenis_kelamin')) {
            $query->where('jenis_kelamin', $request->jenis_kelamin);
        }
        if ($request->filled('stat_peg')) {
            $query->where('id_stat_peg', $request->stat_peg);
        }

            $pegawai = $query->get();
            $statpeg = StatPegawai::all();
            $user = Auth::user();
            $ptk = $user->ptk;
            if ($ptk) {
                $rombels = Rombel::where('id_ptk_walas', $ptk->id)->get();
            } else {
                $rombels = collect(); // koleksi kosong
            }
            $dokumenList = DokumenPTK::whereIn('id_ptk', $pegawai->pluck('id'))->get()
            ->groupBy('id_ptk');
        return view('admin.pages.pegawai.index', compact('pegawai', 'statpeg','rombels', 'dokumenList'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = [
            'status_kawin' => StatKawin::get(),
            'status_kepegawaian' => StatPegawai::get(),
            'jenis_ptk' => JenisPTK::get(),
            'sumber_gaji' => SumberGaji::get(),
            'provinsi' => Provinsi::get(),
            'kabupaten' => Kabupaten::get(),
            'kecamatan' => Kecamatan::get(),
            'kelurahan' => Kelurahan::get(),
            'bank' => Bank::get(),
            'pangkat' => Pangkat::get(),
            'agama' => Agama::get(),
            'tugas_tambahan' => TgsTambahan::get(),
            'pekerjaan_pasangan' => Pekerjaan::get(),
        ];
        return view('admin.pages.pegawai.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //dd($request->all());
        $validated = $request->validate([
            'nama' => ['sometimes', 'required', 'string', 'max:100'],
            'NIK' => ['sometimes', 'required', 'digits:16', 'unique:tb_ptk,NIK'],
            'NIP' => ['sometimes', 'nullable', 'string', 'max:18'],
            'NUPTK' => ['sometimes', 'nullable', 'string', 'max:255'],
            'email' => ['sometimes', 'required', 'email', 'max:50', 'unique:tb_ptk,email'],
            'jenis_kelamin' => ['sometimes', 'required', 'string', 'max:10'],
            'tempat_lahir' => ['sometimes', 'required', 'string', 'max:30'],
            'tgl_lahir' => ['sometimes', 'required', 'date'],
            'id_stat_peg' => ['sometimes', 'nullable', 'integer'],
            'id_jns_ptk' => ['sometimes', 'nullable', 'integer'],
            'id_agama' => ['sometimes', 'nullable', 'integer'],
            'Jalan' => ['sometimes', 'required', 'string', 'max:40'],
            'No_rumah' => ['sometimes', 'required', 'string', 'max:4'],
            'RT' => ['sometimes', 'required', 'string', 'max:4'],
            'RW' => ['sometimes', 'required', 'string', 'max:4'],
            'id_provinsi' => ['sometimes', 'nullable', 'integer'],
            'id_kabupaten' => ['sometimes', 'nullable', 'integer'],
            'id_kecamatan' => ['sometimes', 'nullable', 'integer'],
            'id_kelurahan' => ['sometimes', 'nullable', 'integer'],
            'kode_pos' => ['sometimes', 'required', 'digits:5'],
            'no_telepon' => ['sometimes', 'nullable', 'string', 'max:15'],
            'hp' => ['sometimes', 'required', 'string', 'max:15'],
            'lintang' => ['sometimes', 'nullable', 'string', 'max:50'],
            'bujur' => ['sometimes', 'nullable', 'string', 'max:50'],
            'id_tgstambahan' => ['sometimes', 'nullable', 'integer'],
            'no_sk_cpns' => ['sometimes', 'nullable', 'string', 'max:100'],
            'tgl_sk_cpns' => ['sometimes', 'nullable', 'date'],
            'no_sk_pengangkatan' => ['sometimes', 'nullable', 'string', 'max:100'],
            'tmt_pengangkatan' => ['sometimes', 'nullable', 'date'],
            'lembaga_pengangkatan' => ['sometimes', 'nullable', 'string', 'max:20'],
            'id_pangkat' => ['sometimes', 'nullable', 'integer'],
            'nama_ibu_kandung' => ['sometimes', 'required', 'string', 'max:50'],
            'id_statkawin' => ['sometimes', 'nullable', 'integer'],
            'nama_pasangan' => ['sometimes', 'nullable', 'string', 'max:50'],
            'nip_pasangan' => ['sometimes', 'nullable', 'string', 'max:18'],
            'id_pekerjaan_pasangan' => ['sometimes', 'nullable', 'integer'],
            'lisensi_kepsek' => ['sometimes', 'required', 'in:0,1'],
            'diklat_pengawas' => ['sometimes', 'required', 'in:0,1'],
            'keahlian_braille' => ['sometimes', 'required', 'in:0,1'],
            'keahlian_bahasa_isyarat' => ['sometimes', 'required', 'in:0,1'],
            'no_npwp' => ['sometimes', 'nullable', 'string', 'max:25'],
            'nama_wajib_pajak' => ['sometimes', 'required', 'string', 'max:50'],
            'kewarganegaraan' => ['sometimes', 'required', 'string', 'max:25'],
            'id_bank' => ['sometimes', 'nullable', 'integer'],
            'id_sumber_gaji' => ['sometimes', 'nullable', 'integer'],
            'no_rek_bank' => ['sometimes', 'required', 'string', 'max:50'],
            'rek_atas_nama' => ['sometimes', 'required', 'string', 'max:100'],
            'no_kk' => ['sometimes', 'required', 'digits:16'],
            'no_karpeg' => ['sometimes', 'nullable', 'string', 'max:8'],
            'no_karis_karsu' => ['sometimes', 'nullable', 'string', 'max:11'],
            'nuks' => ['sometimes', 'nullable', 'string', 'max:15'],
        ]);

        $created = Pegawai::create($validated);
        if ($created) {
            return redirect()->route('admin.pegawai.index')->with('success', 'Data berhasil disimpan.');
        }
        return redirect()->route('admin.pegawai.index')->with('error', 'Data gagal disimpan.');
    }

    /**
     * Display the specified resource.
     */
    public function detail(string $id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $client = new Client();
        $url = "http://127.0.0.1:8000/api/pegawai/$id";
        $response = $client->request('GET', $url);
        $content = $response->getBody()->getContents();
        $contentArray = json_decode($content, true);
        $data = [
            'status_kawin' => StatKawin::get(),
            'status_kepegawaian' => StatPegawai::get(),
            'jenis_ptk' => JenisPTK::get(),
            'sumber_gaji' => SumberGaji::get(),
            'provinsi' => Provinsi::get(),
            'kabupaten' => Kabupaten::get(),
            'kecamatan' => Kecamatan::get(),
            'kelurahan' => Kelurahan::get(),
            'bank' => Bank::get(),
            'pangkat' => Pangkat::get(),
            'agama' => Agama::get(),
            'tugas_tambahan' => TgsTambahan::get(),
            'pekerjaan_pasangan' => Pekerjaan::get(),
        ];
       if($contentArray['status']!=true){
        echo "Data tidak ditemukan";
       } else {
        $pegawai = $contentArray['data'];
        return view('admin.pages.pegawai.edit',$data, [
            'pegawai' => $pegawai,
        ]);
       }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $pegawai = Pegawai::findOrFail($id);

        $validated = $request->validate([
            'nama' => ['sometimes', 'required', 'string', 'max:100'],
            'NIK' => ['sometimes', 'required', 'digits:16'],
            'NIP' => ['sometimes', 'nullable', 'string', 'max:18'],
            'NUPTK' => ['sometimes', 'nullable', 'string', 'max:255'],
            'email' => ['sometimes', 'required', 'email', 'max:50'],
            'jenis_kelamin' => ['sometimes', 'required', 'string', 'max:10'],
            'tempat_lahir' => ['sometimes', 'required', 'string', 'max:30'],
            'tgl_lahir' => ['sometimes', 'required', 'date'],
            'id_stat_peg' => ['sometimes', 'nullable', 'integer'],
            'id_jns_ptk' => ['sometimes', 'nullable', 'integer'],
            'id_agama' => ['sometimes', 'nullable', 'integer'],
            'Jalan' => ['sometimes', 'required', 'string', 'max:40'],
            'No_rumah' => ['sometimes', 'required', 'string', 'max:4'],
            'RT' => ['sometimes', 'required', 'string', 'max:4'],
            'RW' => ['sometimes', 'required', 'string', 'max:4'],
            'id_provinsi' => ['sometimes', 'nullable', 'integer'],
            'id_kabupaten' => ['sometimes', 'nullable', 'integer'],
            'id_kecamatan' => ['sometimes', 'nullable', 'integer'],
            'id_kelurahan' => ['sometimes', 'nullable', 'integer'],
            'kode_pos' => ['sometimes', 'required', 'digits:5'],
            'no_telepon' => ['sometimes', 'nullable', 'string', 'max:15'],
            'hp' => ['sometimes', 'required', 'string', 'max:15'],
            'lintang' => ['sometimes', 'nullable', 'string', 'max:50'],
            'bujur' => ['sometimes', 'nullable', 'string', 'max:50'],
            'id_tgstambahan' => ['sometimes', 'nullable', 'integer'],
            'no_sk_cpns' => ['sometimes', 'nullable', 'string', 'max:100'],
            'tgl_sk_cpns' => ['sometimes', 'nullable', 'date'],
            'no_sk_pengangkatan' => ['sometimes', 'nullable', 'string', 'max:100'],
            'tmt_pengangkatan' => ['sometimes', 'nullable', 'date'],
            'lembaga_pengangkatan' => ['sometimes', 'nullable', 'string', 'max:20'],
            'id_pangkat' => ['sometimes', 'nullable', 'integer'],
            'nama_ibu_kandung' => ['sometimes', 'required', 'string', 'max:50'],
            'id_statkawin' => ['sometimes', 'nullable', 'integer'],
            'nama_pasangan' => ['sometimes', 'nullable', 'string', 'max:50'],
            'nip_pasangan' => ['sometimes', 'nullable', 'string', 'max:18'],
            'id_pekerjaan_pasangan' => ['sometimes', 'nullable', 'integer'],
            'lisensi_kepsek' => ['sometimes', 'required', 'in:0,1'],
            'diklat_pengawas' => ['sometimes', 'required', 'in:0,1'],
            'keahlian_braille' => ['sometimes', 'required', 'in:0,1'],
            'keahlian_bahasa_isyarat' => ['sometimes', 'required', 'in:0,1'],
            'no_npwp' => ['sometimes', 'nullable', 'string', 'max:25'],
            'nama_wajib_pajak' => ['sometimes', 'required', 'string', 'max:50'],
            'kewarganegaraan' => ['sometimes', 'required', 'string', 'max:25'],
            'id_bank' => ['sometimes', 'nullable', 'integer'],
            'id_sumber_gaji' => ['sometimes', 'nullable', 'integer'],
            'no_rek_bank' => ['sometimes', 'required', 'string', 'max:50'],
            'rek_atas_nama' => ['sometimes', 'required', 'string', 'max:100'],
            'no_kk' => ['sometimes', 'required', 'digits:16'],
            'no_karpeg' => ['sometimes', 'nullable', 'string', 'max:8'],
            'no_karis_karsu' => ['sometimes', 'nullable', 'string', 'max:11'],
            'nuks' => ['sometimes', 'nullable', 'string', 'max:15'],
        ]);

        $pegawai->update($validated);
        if ($pegawai) {
            return redirect()->route('admin.pegawai.index')->with('success', 'Data berhasil disimpan.');
        }
        return redirect()->route('admin.pegawai.index')->with('error', 'Data gagal disimpan.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $client = new Client();
        $url = "http://127.0.0.1:8000/api/pegawai/$id";
        $response = $client->request('DELETE', $url);
        $content = $response->getBody()->getContents();
        $contentArray = json_decode($content, true);
        if($contentArray['status']!= true) {
            $error = $contentArray['data'];
            return redirect()->back()->withErrors($error)->withInput();
        }else{
            return redirect()->to('admin/pegawai')->with('success','Berhasil menghapus data');
        }
    }

    public function pegawaiExport(){
        return Excel::download(new PegawaiExport, 'pegawai.xlsx');
    }

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xls,xlsx'
        ]);

        // Buat instance dari PegawaiImport agar bisa akses failures
        $import = new PegawaiImport;

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

        return redirect()->route('admin.pegawai.index')->with('success', 'Data pegawai berhasil diimpor');
    }

    public function downloadTemplate()
    {
        return Excel::download(new \App\Exports\PegawaiTemplateExport, 'Template_Pegawai.xlsx');
    }

    public function uploadDocument(Request $request)
    {
        $request->validate([
            'jenis_file' => 'required|string',
            'file' => 'required|mimes:pdf|max:2048', // Hanya PDF max 2MB
        ]);

        $user = auth()->user();
        $ptkId = $user->ptk_id;

        // Pastikan siswa ID tersedia
        if (!$ptkId) {
            abort(403, 'Unauthorized. Siswa ID not found.');
        }

        $file = $request->file('file');

        // Cari dokumen lama berdasarkan jenis_file & id_ptk
        $dokumenLama = DokumenPTK::where('id_ptk', $ptkId)
            ->where('jenis_file', $request->jenis_file)
            ->first();

        // Hapus file lama jika ada
        if ($dokumenLama && Storage::disk('public')->exists($dokumenLama->path)) {
            Storage::disk('public')->delete($dokumenLama->path);
        }

        // Simpan file baru
        $path = $file->store("dokumen/ptk/$ptkId", 'public');

        // Simpan ke database (replace atau insert)
        DokumenPTK::updateOrCreate(
            ['id_ptk' => $ptkId, 'jenis_file' => $request->jenis_file],
            [
                'nama_file' => $file->hashName(),
                'nama_asli_file' => $file->getClientOriginalName(),
                'path' => $path,
            ]
        );

        return back()->with('success', 'File berhasil diupload.');
    }

}
