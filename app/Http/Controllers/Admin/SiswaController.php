<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Siswa;
use App\Models\Jurusan;
use App\Models\Rombel;
use App\Models\Agama;
use App\Models\Provinsi;
use App\Models\Kabupaten;
use App\Models\Kecamatan;
use App\Models\Kelurahan;
use App\Models\JenisTinggal;
use App\Models\Transportasi;
use App\Models\Pendidikan;
use App\Models\Pekerjaan;
use App\Models\Penghasilan;
use App\Models\KrtBantuan;
use App\Models\Bank;
use App\Models\PrgBantuan;
use App\Models\KebKhusus;
use App\Models\Sekolah;

use App\Imports\SiswaImport;
use GuzzleHttp\Client;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Validators\ValidationException;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $user = Auth::user();

        $rombel = Rombel::all();
        $jurusan = Jurusan::all();
        $rombels = Rombel::all(); 

        // Jika user adalah siswa
        if ($user->role->role === 'siswa') {
            $s = Siswa::with(['rombel', 'jurusan'])->findOrFail($user->siswa_id);

            return view('Admin.pages.siswa.index', [
                'siswa' => null,
                'rombel' => $rombel,
                'jurusan' => $jurusan,
                'rombels' => $rombels,
                's' => $s,
                'siswas' => null,
            ]);
        }

        // Jika user adalah pegawai
        if ($user->role->role === 'pegawai') {
            $rombels = Rombel::where('id_jur', $user->ptk->id_jur)->get();
            $rombelIds = $rombels->pluck('id')->toArray();
            $siswas = Siswa::whereIn('id_rombel', $rombelIds)->with(['rombel', 'jurusan'])->get();

            return view('Admin.pages.siswa.index', [
                'siswa' => null,
                'rombel' => $rombel,
                'jurusan' => $jurusan,
                'rombels' => $rombels,
                'siswas' => $siswas,
            ]);
        }

        // Jika adminSiswa atau lainnya (tanpa API)
        $siswa = Siswa::with(['rombel', 'jurusan'])
            ->when($request->nama_rombel, function ($query) use ($request) {
                $query->whereHas('rombel', function ($q) use ($request) {
                    $q->where('nama_rombel', $request->nama_rombel);
                });
            })
            ->when($request->nama_jur, function ($query) use ($request) {
                $query->whereHas('jurusan', function ($q) use ($request) {
                    $q->where('nama_jur', $request->nama_jur);
                });
            })->get();

        return view('Admin.pages.siswa.index', [
            'siswa' => $siswa,
            'rombel' => $rombel,
            'jurusan' => $jurusan,
            'rombels' => $rombels,
            'siswas' => null,
        ]);
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = [
            'jurusan' => Jurusan::get(),
            'rombel' => Rombel::get(),
            'agama' => Agama::get(),
            'provinsi' => Provinsi::get(),
            'kabupaten' => Kabupaten::get(),
            'kecamatan' => Kecamatan::get(),
            'kelurahan' => Kelurahan::get(),
            'jns_tinggal' => JenisTinggal::get(),
            'transport' => Transportasi::get(),
            'pendidikan' => Pendidikan::get(),
            'pekerjaan' => Pekerjaan::get(),
            'penghasilan' => Penghasilan::get(),
            'krt_bantuan' => KrtBantuan::get(),
            'bank' => Bank::get(),
            'prgbantuan' => PrgBantuan::get(),
            'kebkhusus' => KebKhusus::get(),
            'sklasal' => Sekolah::get(),
        ];

        return view('Admin.pages.siswa.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => ['sometimes', 'required', 'string', 'max:100'],
            'NIK' => ['sometimes', 'required', 'digits:16', 'unique:tb_siswa,NIK'],
            'jenis_kelamin' => ['sometimes', 'required', 'string', 'max:10'],
            'no_kk' => ['sometimes', 'required', 'digits:16'],
            'no_reg_aktlhr' => ['sometimes', 'nullable', 'string', 'max:25'],
            'nipd' => ['sometimes', 'required', 'string', 'max:10', 'unique:tb_siswa,nipd'],
            'nisn' => ['sometimes', 'required', 'max:11', 'unique:tb_siswa,nisn'],
            'id_jur' => ['sometimes', 'nullable', 'integer'],
            'id_rombel' => ['sometimes', 'nullable', 'integer'],
            'tempat_lahir' => ['sometimes', 'required', 'string', 'max:30'],
            'tgl_lahir' => ['sometimes', 'required', 'date'],
            'id_agama' => ['sometimes', 'nullable', 'integer'],
            'npsn' => ['sometimes', 'nullable', 'string', 'max:12'],
            'hp' => ['sometimes', 'required', 'string', 'max:15'],
            'email' => ['sometimes', 'nullable', 'email', 'max:50', 'unique:tb_siswa,email'],
            'anak_ke' => ['sometimes', 'required', 'integer', 'min:1'],
            'jml_saudara_kandung' => ['sometimes', 'nullable', 'integer', 'min:0'],
            'berat_badan' => ['sometimes', 'required', 'numeric', 'min:1'],
            'tinggi_badan' => ['sometimes', 'required', 'numeric', 'min:1'],
            'lingkar_kepala' => ['sometimes', 'required', 'numeric', 'min:0'],
            'kewarganegaraan' => ['sometimes', 'required', 'string', 'max:25'],
            'Jalan' => ['sometimes', 'nullable', 'string', 'max:40'],
            'no_rumah' => ['sometimes', 'nullable', 'string', 'max:4'],
            'RT' => ['sometimes', 'required', 'string', 'max:4'],
            'RW' => ['sometimes', 'required', 'string', 'max:4'],
            'dusun' => ['sometimes', 'nullable', 'string'],
            'id_provinsi' => ['sometimes', 'nullable', 'integer'],
            'id_kabupaten' => ['sometimes', 'nullable', 'integer'],
            'id_kecamatan' => ['sometimes', 'nullable', 'integer'],
            'id_kelurahan' => ['sometimes', 'nullable', 'integer'],
            'kode_pos' => ['sometimes', 'required', 'digits:5'],
            'lintang' => ['sometimes', 'nullable', 'string', 'max:50'],
            'bujur' => ['sometimes', 'nullable', 'string', 'max:50'],
            'no_telepon' => ['sometimes', 'nullable', 'string', 'max:15'],
            'id_jns_tgl' => ['sometimes', 'nullable', 'integer'],
            'id_transport' => ['sometimes', 'nullable', 'integer'],
            'jrk_rumah_sekolah' => ['sometimes', 'required', 'numeric', 'min:0'],
            'nama_ayah' => ['sometimes', 'required', 'string', 'max:100'],
            'nik_ayah' => ['sometimes', 'required', 'digits:16'],
            'thn_lahir_ayah' => ['sometimes', 'required', 'digits:4'],
            'id_pendidikan_ayah' => ['sometimes', 'nullable', 'integer'],
            'id_kerja_ayah' => ['sometimes', 'nullable', 'integer'],
            'id_penghasilan_ayah' => ['sometimes', 'nullable', 'integer'],
            'nama_ibu' => ['sometimes', 'required', 'string', 'max:100'],
            'nik_ibu' => ['sometimes', 'required', 'digits:16'],
            'thn_lahir_ibu' => ['sometimes', 'required', 'digits:4'],
            'id_pendidikan_ibu' => ['sometimes', 'nullable', 'integer'],
            'id_kerja_ibu' => ['sometimes', 'nullable', 'integer'],
            'id_penghasilan_ibu' => ['sometimes', 'nullable', 'integer'],
            'nama_wali' => ['sometimes', 'nullable', 'string', 'max:100'],
            'nik_wali' => ['sometimes', 'nullable', 'digits:16'],
            'thn_lahir_wali' => ['sometimes', 'nullable', 'digits:4'],
            'id_pendidikan_wali' => ['sometimes', 'nullable', 'integer'],
            'id_kerja_wali' => ['sometimes', 'nullable', 'integer'],
            'id_penghasilan_wali' => ['sometimes', 'nullable', 'integer'],
            'no_skhun' => ['sometimes', 'nullable', 'string', 'max:35'],
            'nopes_un' => ['sometimes', 'nullable', 'string', 'max:35'],
            'no_seri_ijazah' => ['sometimes', 'nullable', 'string', 'max:35'],
            'id_krt_bantuan_kip' => ['sometimes', 'nullable', 'integer'],
            'id_krt_bantuan_kps' => ['sometimes', 'nullable', 'integer'],
            'id_krt_bantuan_kks' => ['sometimes', 'nullable', 'integer'],
            'id_krt_bantuan' => ['sometimes', 'nullable', 'integer'],
            'nama_pada_kartu' => ['sometimes', 'nullable', 'string', 'max:100'],
            'id_bank' => ['sometimes', 'nullable', 'integer'],
            'no_rek_bank' => ['sometimes', 'nullable', 'string', 'max:50'],
            'rek_atas_nama' => ['sometimes', 'nullable', 'string', 'max:100'],
            'layak_bantuan' => ['sometimes', 'required', 'in:0,1'],
            'id_prgbantuan' => ['sometimes', 'nullable', 'integer'],
            'alasan_layak' => ['sometimes', 'nullable', 'string', 'max:255'],
            'id_kebkhusus' => ['sometimes', 'nullable', 'integer'],
            'id_sekolah_asal' => ['sometimes', 'nullable', 'integer'],
            'Stat_siswa' => ['sometimes', 'required', 'string', 'max:20'],
            'pindahan' => ['sometimes', 'required', 'in:0,1'],
        ]);
        
        $created = Siswa::create($validated);
        if ($created) {
            return redirect()->route('admin.siswa.index')->with('success', 'Data berhasil disimpan.');
        }
        return redirect()->route('admin.siswa.index')->with('error', 'Data gagal disimpan.');
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
        $url = "http://127.0.0.1:8000/api/siswa/$id";
        $response = $client->request('GET', $url);
        $content = $response->getBody()->getContents();
        $contentArray = json_decode($content, true);
        $data = [
            'siswa' => Siswa::findOrFail($id),
            'jurusan' => Jurusan::get(),
            'rombel' => Rombel::get(),
            'agama' => Agama::get(),
            'provinsi' => Provinsi::get(),
            'kabupaten' => Kabupaten::get(),
            'kecamatan' => Kecamatan::get(),
            'kelurahan' => Kelurahan::get(),
            'jns_tinggal' => JenisTinggal::get(),
            'transport' => Transportasi::get(),
            'pendidikan' => Pendidikan::get(),
            'pekerjaan' => Pekerjaan::get(),
            'penghasilan' => Penghasilan::get(),
            'krt_bantuan' => KrtBantuan::get(),
            'bank' => Bank::get(),
            'prgbantuan' => PrgBantuan::get(),
            'kebkhusus' => KebKhusus::get(),
            'sklasal' => Sekolah::get(),
        ];
        if($contentArray['status']!=true){
            echo "Data tidak ditemukan";
           } else {
            $siswa = $contentArray['data'];
            return view('Admin.pages.siswa.edit', $data, ['siswa' => $siswa,]);
           }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $siswa = Siswa::findOrFail($id);

        $validated = $request->validate([
            'nama' => ['sometimes', 'required', 'string', 'max:100'],
            'NIK' => ['sometimes', 'required', 'digits:16'],
            'jenis_kelamin' => ['sometimes', 'required', 'string', 'max:10'],
            'no_kk' => ['sometimes', 'required', 'digits:16'],
            'no_reg_aktlhr' => ['sometimes', 'nullable', 'string', 'max:25'],
            'nipd' => ['sometimes', 'required', 'string', 'max:10'],
            'nisn' => ['sometimes', 'required', 'max:11'],
            'id_jur' => ['sometimes', 'nullable', 'integer'],
            'id_rombel' => ['sometimes', 'nullable', 'integer'],
            'tempat_lahir' => ['sometimes', 'required', 'string', 'max:30'],
            'tgl_lahir' => ['sometimes', 'required', 'date'],
            'id_agama' => ['sometimes', 'nullable', 'integer'],
            'npsn' => ['sometimes', 'nullable', 'string', 'max:12'],
            'hp' => ['sometimes', 'required', 'string', 'max:15'],
            'email' => ['sometimes', 'nullable', 'email', 'max:50'],
            'anak_ke' => ['sometimes', 'required', 'integer', 'min:1'],
            'jml_saudara_kandung' => ['sometimes', 'nullable', 'integer', 'min:0'],
            'berat_badan' => ['sometimes', 'required', 'numeric', 'min:1'],
            'tinggi_badan' => ['sometimes', 'required', 'numeric', 'min:1'],
           'lingkar_kepala' => ['sometimes', 'required', 'numeric', 'min:0'],
            'kewarganegaraan' => ['sometimes', 'required', 'string', 'max:25'],
            'Jalan' => ['sometimes', 'nullable', 'string', 'max:40'],
            'no_rumah' => ['sometimes', 'nullable', 'string', 'max:4'],
            'RT' => ['sometimes', 'required', 'string', 'max:4'],
            'RW' => ['sometimes', 'required', 'string', 'max:4'],
            'dusun' => ['sometimes', 'nullable', 'string'],
            'id_provinsi' => ['sometimes', 'nullable', 'integer'],
            'id_kabupaten' => ['sometimes', 'nullable', 'integer'],
            'id_kecamatan' => ['sometimes', 'nullable', 'integer'],
            'id_kelurahan' => ['sometimes', 'nullable', 'integer'],
            'kode_pos' => ['sometimes', 'required', 'digits:5'],
            'lintang' => ['sometimes', 'nullable', 'string', 'max:50'],
            'bujur' => ['sometimes', 'nullable', 'string', 'max:50'],
            'no_telepon' => ['sometimes', 'nullable', 'string', 'max:15'],
            'id_jns_tgl' => ['sometimes', 'nullable', 'integer'],
            'id_transport' => ['sometimes', 'nullable', 'integer'],
            'jrk_rumah_sekolah' => ['sometimes', 'required', 'numeric', 'min:0'],
            'nama_ayah' => ['sometimes', 'required', 'string', 'max:100'],
            'nik_ayah' => ['sometimes', 'required'],
            'thn_lahir_ayah' => ['sometimes', 'required'],
            'id_pendidikan_ayah' => ['sometimes', 'nullable', 'integer'],
            'id_kerja_ayah' => ['sometimes', 'nullable', 'integer'],
            'id_penghasilan_ayah' => ['sometimes', 'nullable', 'integer'],
            'nama_ibu' => ['sometimes', 'required', 'string', 'max:100'],
            'nik_ibu' => ['sometimes', 'required'],
            'thn_lahir_ibu' => ['sometimes', 'required'],
            'id_pendidikan_ibu' => ['sometimes', 'nullable', 'integer'],
            'id_kerja_ibu' => ['sometimes', 'nullable', 'integer'],
            'id_penghasilan_ibu' => ['sometimes', 'nullable', 'integer'],
            'nama_wali' => ['sometimes', 'nullable', 'string', 'max:100'],
            'nik_wali' => ['sometimes', 'nullable'],
            'thn_lahir_wali' => ['sometimes', 'nullable'],
            'id_pendidikan_wali' => ['sometimes', 'nullable', 'integer'],
            'id_kerja_wali' => ['sometimes', 'nullable', 'integer'],
            'id_penghasilan_wali' => ['sometimes', 'nullable', 'integer'],
            'no_skhun' => ['sometimes', 'nullable', 'string', 'max:35'],
            'nopes_un' => ['sometimes', 'nullable', 'string', 'max:35'],
            'no_seri_ijazah' => ['sometimes', 'nullable', 'string', 'max:35'],
            'id_krt_bantuan' => ['sometimes', 'nullable', 'integer'],
            'id_krt_bantuan_kip' => ['sometimes', 'nullable', 'integer'],
            'id_krt_bantuan_kps' => ['sometimes', 'nullable', 'integer'],
            'id_krt_bantuan_kks' => ['sometimes', 'nullable', 'integer'],
            'nama_pada_kartu' => ['sometimes', 'nullable', 'string', 'max:100'],
            'id_bank' => ['sometimes', 'nullable', 'integer'],
            'no_rek_bank' => ['sometimes', 'nullable', 'string', 'max:50'],
            'rek_atas_nama' => ['sometimes', 'nullable', 'string', 'max:100'],
            'layak_bantuan' => ['sometimes', 'required', 'in:0,1'],
            'id_prgbantuan' => ['sometimes', 'nullable', 'integer'],
            'alasan_layak' => ['sometimes', 'nullable', 'string', 'max:255'],
            'id_kebkhusus' => ['sometimes', 'nullable', 'integer'],
            'id_sekolah_asal' => ['sometimes', 'nullable', 'integer'],
            'Stat_siswa' => ['sometimes', 'required', 'string', 'max:20'],
            'pindahan' => ['sometimes', 'required', 'in:0,1'],
        ]);

        $siswa->update($validated);
        
        if ($siswa) {
            return redirect()->route('admin.siswa.index')->with('success', 'Data berhasil disimpan.');
        }
        return redirect()->route('admin.siswa.index')->with('error', 'Data gagal disimpan.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $client = new Client();
        $url = "http://127.0.0.1:8000/api/siswa/$id";
        $response = $client->request('DELETE', $url);
        $content = $response->getBody()->getContents();
        $contentArray = json_decode($content, true);
        if($contentArray['status']!= true) {
            $error = $contentArray['data'];
            return redirect()->back()->withErrors($error)->withInput();
        }else{
            return redirect()->to('admin/siswa')->with('success','Berhasil menghapus data');
        }
    }

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xls,xlsx'
        ]);

        // Gunakan instance, bukan langsung new di dalam Excel::import
        $import = new SiswaImport;

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

        return redirect()->route('admin.siswa.index')->with('success', 'Data siswa berhasil diimpor');
    }

    public function naikKelas()
    {
        // Ambil siswa yang masih aktif
        $siswaAktif = Siswa::where('Stat_siswa', 'Aktif')->with('rombel')->get();

        foreach ($siswaAktif as $siswa) {
            $rombel = $siswa->rombel; // diambil dari relasi di model
            if (!$rombel) continue; // skip jika rombel tidak ditemukan

            $namaRombel = $rombel->nama_rombel;

            if (Str::startsWith($namaRombel, 'XII')) {
                $siswa->Stat_siswa = 'Lulus';
            } elseif (Str::startsWith($namaRombel, 'XI')) {
                $rombelBaruNama = preg_replace('/^XI/', 'XII', $namaRombel);
                $rombelBaru = Rombel::where('nama_rombel', $rombelBaruNama)->first();
                if ($rombelBaru) {
                    $siswa->id_rombel = $rombelBaru->id;
                }
            } elseif (Str::startsWith($namaRombel, 'X')) {
                $rombelBaruNama = preg_replace('/^X(?!I)/', 'XI', $namaRombel);
                $rombelBaru = Rombel::where('nama_rombel', $rombelBaruNama)->first();
                if ($rombelBaru) {
                    $siswa->id_rombel = $rombelBaru->id;
                }
            }

            $siswa->save();
        }

        return redirect()->back()->with('success', 'Kenaikan kelas berhasil diproses berdasarkan rombel.');
    }

    public function downloadTemplate()
    {
        return Excel::download(new \App\Exports\SiswaTemplateExport, 'Template_Siswa.xlsx');
    }
}
