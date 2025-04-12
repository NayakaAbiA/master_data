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

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $siswa = Siswa::with([
            'agama',
            'jurusan',
            'rombel',
            'provinsi', 
            'kabupaten', 
            'kecamatan', 
            'kelurahan', 
            'jns_tinggal',
            'transport',
            'pendidikanAyah',
            'pendidikanIbu',
            'pendidikanWali',
            'pekerjaanAyah',
            'pekerjaanIbu',
            'pekerjaanWali',
            'penghasilanAyah',
            'penghasilanIbu',
            'penghasilanWali',
            'krt_bantuan',
            'bank',
            'prgbantuan',
            'kebkhusus'
        ])->get();
        return view('Admin.pages.siswa.index', compact('siswa'));
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
        ];

        return view('Admin.pages.siswa.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => ['sometimes', 'required'],
            'NIK' => ['sometimes', 'required'],
            'no_kk' => ['sometimes', 'required'],
            'no_reg_aktlhr' => ['sometimes', 'nullable'],
            'nipd' => ['sometimes', 'required'],
            'nisn' => ['sometimes', 'required'],
            'id_jur' => ['sometimes', 'nullable'],
            'id_rombel' => ['sometimes', 'nullable'],
            'tempat_lahir' => ['sometimes', 'required'],
            'tgl_lahir' => ['sometimes', 'required'],
            'id_agama' => ['sometimes', 'nullable'],
            'npsn' => ['sometimes', 'nullable'],
            'hp' => ['sometimes', 'required'],
            'email' => ['sometimes', 'required'],
            'anak_ke' => ['sometimes', 'required'],
            'jml_saudara_kandung' => ['sometimes', 'nullable'],
            'berat_badan' => ['sometimes', 'required'],
            'tinggi_badan' => ['sometimes', 'required'],
            'lingkar_kepala' => ['sometimes', 'required'],
            'kewarganegaraan' => ['sometimes', 'required'],
            'Jalan' => ['sometimes', 'required'],
            'no_rumah' => ['sometimes', 'required'],
            'RT' => ['sometimes', 'required'],
            'RW' => ['sometimes', 'required'],
            'id_provinsi' => ['sometimes', 'nullable'],
            'id_kabupaten' => ['sometimes', 'nullable'],
            'id_kecamatan' => ['sometimes', 'nullable'],
            'id_kelurahan' => ['sometimes', 'nullable'],
            'kode_pos' => ['sometimes', 'required'],
            'lintang' => ['sometimes', 'nullable'],
            'bujur' => ['sometimes', 'nullable'],
            'no_telepon' => ['sometimes', 'nullable'],
            'id_jns_tgl' => ['sometimes', 'nullable'],
            'id_transport' => ['sometimes', 'nullable'],
            'jrk_rumah_sekolah' => ['sometimes', 'required'],
            'nama_ayah' => ['sometimes', 'required'],
            'nik_ayah' => ['sometimes', 'required'],
            'thn_lahir_ayah' => ['sometimes', 'required'],
            'id_pendidikan_ayah' => ['sometimes', 'nullable'],
            'id_kerja_ayah' => ['sometimes', 'nullable'],
            'id_penghasilan_ayah' => ['sometimes', 'nullable'],
            'nama_ibu' => ['sometimes', 'required'],
            'nik_ibu' => ['sometimes', 'required'],
            'thn_lahir_ibu' => ['sometimes', 'required'],
            'id_pendidikan_ibu' => ['sometimes', 'nullable'],
            'id_kerja_ibu' => ['sometimes', 'nullable'],
            'id_penghasilan_ibu' => ['sometimes', 'nullable'],
            'nama_wali' => ['sometimes', 'nullable'],
            'nik_wali' => ['sometimes', 'nullable'],
            'thn_lahir_wali' => ['sometimes', 'nullable'],
            'id_pendidikan_wali' => ['sometimes', 'nullable'],
            'id_kerja_wali' => ['sometimes', 'nullable'],
            'id_penghasilan_wali' => ['sometimes', 'nullable'],
            'no_skhun' => ['sometimes', 'nullable'],
            'nopes_un' => ['sometimes', 'required'],
            'no_seri_ijazah' => ['sometimes', 'nullable'],
            'id_krt_bantuan' => ['sometimes', 'nullable'],
            'nama_pada_kartu' => ['sometimes', 'required'],
            'id_bank' => ['sometimes', 'nullable'],
            'no_rek_bank' => ['sometimes', 'nullable'],
            'rek_atas_nama' => ['sometimes', 'nullable'],
            'layak_bantuan' => ['sometimes', 'required'],
            'id_prgbantuan' => ['sometimes', 'nullable'],
            'alasan_layak' => ['sometimes', 'required'],
            'id_kebkhusus' => ['sometimes', 'nullable'],
            'Stat_siswa' => ['sometimes', 'required'],
            'pindahan' => ['sometimes', 'required'],
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
        ];

       return view('Admin.pages.siswa.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $siswa = Siswa::findOrFail($id);

        $validated = $request->validate([
            'nama' => ['sometimes', 'required'],
            'NIK' => ['sometimes', 'required'],
            'no_kk' => ['sometimes', 'required'],
            'no_reg_aktlhr' => ['sometimes', 'nullable'],
            'nipd' => ['sometimes', 'required'],
            'nisn' => ['sometimes', 'required'],
            'id_jur' => ['sometimes', 'nullable'],
            'id_rombel' => ['sometimes', 'nullable'],
            'tempat_lahir' => ['sometimes', 'required'],
            'tgl_lahir' => ['sometimes', 'required'],
            'id_agama' => ['sometimes', 'nullable'],
            'npsn' => ['sometimes', 'nullable'],
            'hp' => ['sometimes', 'required'],
            'email' => ['sometimes', 'required'],
            'anak_ke' => ['sometimes', 'required'],
            'jml_saudara_kandung' => ['sometimes', 'nullable'],
            'berat_badan' => ['sometimes', 'required'],
            'tinggi_badan' => ['sometimes', 'required'],
            'lingkar_kepala' => ['sometimes', 'required'],
            'kewarganegaraan' => ['sometimes', 'required'],
            'Jalan' => ['sometimes', 'required'],
            'no_rumah' => ['sometimes', 'required'],
            'RT' => ['sometimes', 'required'],
            'RW' => ['sometimes', 'required'],
            'id_provinsi' => ['sometimes', 'nullable'],
            'id_kabupaten' => ['sometimes', 'nullable'],
            'id_kecamatan' => ['sometimes', 'nullable'],
            'id_kelurahan' => ['sometimes', 'nullable'],
            'kode_pos' => ['sometimes', 'required'],
            'lintang' => ['sometimes', 'nullable'],
            'bujur' => ['sometimes', 'nullable'],
            'no_telepon' => ['sometimes', 'nullable'],
            'id_jns_tgl' => ['sometimes', 'nullable'],
            'id_transport' => ['sometimes', 'nullable'],
            'jrk_rumah_sekolah' => ['sometimes', 'required'],
            'nama_ayah' => ['sometimes', 'required'],
            'nik_ayah' => ['sometimes', 'required'],
            'thn_lahir_ayah' => ['sometimes', 'required'],
            'id_pendidikan_ayah' => ['sometimes', 'nullable'],
            'id_kerja_ayah' => ['sometimes', 'nullable'],
            'id_penghasilan_ayah' => ['sometimes', 'nullable'],
            'nama_ibu' => ['sometimes', 'required'],
            'nik_ibu' => ['sometimes', 'required'],
            'thn_lahir_ibu' => ['sometimes', 'required'],
            'id_pendidikan_ibu' => ['sometimes', 'nullable'],
            'id_kerja_ibu' => ['sometimes', 'nullable'],
            'id_penghasilan_ibu' => ['sometimes', 'nullable'],
            'nama_wali' => ['sometimes', 'nullable'],
            'nik_wali' => ['sometimes', 'nullable'],
            'thn_lahir_wali' => ['sometimes', 'nullable'],
            'id_pendidikan_wali' => ['sometimes', 'nullable'],
            'id_kerja_wali' => ['sometimes', 'nullable'],
            'id_penghasilan_wali' => ['sometimes', 'nullable'],
            'no_skhun' => ['sometimes', 'nullable'],
            'nopes_un' => ['sometimes', 'required'],
            'no_seri_ijazah' => ['sometimes', 'nullable'],
            'id_krt_bantuan' => ['sometimes', 'nullable'],
            'nama_pada_kartu' => ['sometimes', 'required'],
            'id_bank' => ['sometimes', 'nullable'],
            'no_rek_bank' => ['sometimes', 'nullable'],
            'rek_atas_nama' => ['sometimes', 'nullable'],
            'layak_bantuan' => ['sometimes', 'required'],
            'id_prgbantuan' => ['sometimes', 'nullable'],
            'alasan_layak' => ['sometimes', 'required'],
            'id_kebkhusus' => ['sometimes', 'nullable'],
            'Stat_siswa' => ['sometimes', 'required'],
            'pindahan' => ['sometimes', 'required'],
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
        $siswa = Siswa::findOrFail($id);

        if ($siswa) {
            $siswa->delete(); //hapus data, jika $siswa ada
            return redirect()->route('admin.siswa.index')->with('success', 'Data berhasil disimpan.');
        }
        return redirect()->route('admin.siswa.index')->with('error', 'Data gagal disimpan.');
    }
}
