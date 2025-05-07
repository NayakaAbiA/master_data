<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pegawai;
use App\Models\StatKawin;
use App\Models\StatPegawai;
use App\Models\JenisPTK;
use App\Models\SumberGaji;
use App\Models\Provinsi;
use App\Models\Kabupaten;
use App\Models\Kecamatan;
use App\Models\Kelurahan;
use App\Models\Bank;
use App\Models\Pangkat;
use App\Models\Agama;
use App\Models\TgsTambahan;
use App\Models\Pekerjaan;

use App\Exports\pegawaiExport;
use Maatwebsite\Excel\Facades\Excel;

class PegawaiController extends Controller
{
      /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //relasi dengan model lain,untuk show data
        $pegawai = Pegawai::with([
            'statpegawai', 
            'agama',
            'statkawin', 
            'pekerjaan_pasangan', 
            'provinsi', 
            'kabupaten', 
            'kecamatan', 
            'kelurahan', 
            'jns_ptk', 
            'pangkat', 
            'tgstambahan', 
            'sumber_gaji', 
            'bank'
        ])->get();
        return view('admin.pages.pegawai.index', compact('pegawai'));
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
            'nama' => ['sometimes', 'required'],
            'NIK' => ['sometimes', 'required'],
            'NIP' => ['sometimes', 'nullable'],
            'NUPTK' => ['sometimes', 'nullable'],
            'email' => ['sometimes', 'required'],
            'jenis_kelamin' => ['sometimes', 'required'],
            'tempat_lahir' => ['sometimes', 'required'],
            'tgl_lahir' => ['sometimes', 'required'],
            'id_stat_peg' => ['sometimes', 'nullable'],
            'id_jns_ptk' => ['sometimes', 'nullable'],
            'id_agama' => ['sometimes', 'nullable'],
            'Jalan' => ['sometimes', 'required'],
            'No_rumah' => ['sometimes', 'required'],
            'RT' => ['sometimes', 'required'],
            'RW' => ['sometimes', 'required'],
            'id_provinsi' => ['sometimes', 'nullable'],
            'id_kabupaten' => ['sometimes', 'nullable'],
            'id_kecamatan' => ['sometimes', 'nullable'],
            'id_kelurahan' => ['sometimes', 'nullable'],
            'kode_pos' => ['sometimes', 'required'],
            'no_telepon' => ['sometimes', 'nullable'],
            'hp' => ['sometimes', 'required'],
            'lintang' => ['sometimes', 'nullable'],
            'bujur' => ['sometimes', 'nullable'],
            'id_tgstambahan' => ['sometimes', 'nullable'],
            'no_sk_cpns' => ['sometimes', 'nullable'],
            'tgl_sk_cpns' => ['sometimes', 'nullable'],
            'no_sk_pengangkatan' => ['sometimes', 'nullable'],
            'tmt_pengangkatan' => ['sometimes', 'nullable'],
            'lembaga_pengangkatan' => ['sometimes', 'nullable'],
            'id_pangkat' => ['sometimes', 'nullable'],
            'nama_ibu_kandung' => ['sometimes', 'required'],
            'id_statkawin' => ['sometimes', 'nullable'],
            'nama_pasangan' => ['sometimes', 'nullable'],
            'nip_pasangan' => ['sometimes', 'nullable'],
            'id_pekerjaan_pasangan' => ['sometimes', 'nullable'],
            'lisensi_kepsek' => ['sometimes', 'required'],
            'diklat_pengawas' => ['sometimes', 'required'],
            'keahlian_braille' => ['sometimes', 'required'],
            'keahlian_bahasa_isyarat' => ['sometimes', 'required'],
            'no_npwp' => ['sometimes', 'nullable'],
            'nama_wajib_pajak' => ['sometimes', 'required'],
            'kewarganegaraan' => ['sometimes', 'required'],
            'id_bank' => ['sometimes', 'nullable'],
            'id_sumber_gaji' => ['sometimes', 'nullable'],
            'no_rek_bank' => ['sometimes', 'required'],
            'rek_atas_nama' => ['sometimes', 'required'],
            'no_kk' => ['sometimes', 'required'],
            'no_karpeg' => ['sometimes', 'nullable'],
            'no_karis_karsu' => ['sometimes', 'nullable'],
            'nuks' => ['sometimes', 'nullable'],
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
            'pegawai' => Pegawai::findOrFail($id),
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
        return view('admin.pages.pegawai.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $pegawai = Pegawai::findOrFail($id);

        $validated = $request->validate([
            'nama' => ['sometimes', 'required'],
            'NIK' => ['sometimes', 'required'],
            'NIP' => ['sometimes', 'nullable'],
            'NUPTK' => ['sometimes', 'nullable'],
            'email' => ['sometimes', 'required'],
            'jenis_kelamin' => ['sometimes', 'required'],
            'tempat_lahir' => ['sometimes', 'required'],
            'tgl_lahir' => ['sometimes', 'required'],
            'id_stat_peg' => ['sometimes', 'nullable'],
            'id_jns_ptk' => ['sometimes', 'nullable'],
            'id_agama' => ['sometimes', 'nullable'],
            'Jalan' => ['sometimes', 'required'],
            'No_rumah' => ['sometimes', 'required'],
            'RT' => ['sometimes', 'required'],
            'RW' => ['sometimes', 'required'],
            'id_provinsi' => ['sometimes', 'nullable'],
            'id_kabupaten' => ['sometimes', 'nullable'],
            'id_kecamatan' => ['sometimes', 'nullable'],
            'id_kelurahan' => ['sometimes', 'nullable'],
            'kode_pos' => ['sometimes', 'required'],
            'no_telepon' => ['sometimes', 'nullable'],
            'hp' => ['sometimes', 'required'],
            'lintang' => ['sometimes', 'nullable'],
            'bujur' => ['sometimes', 'nullable'],
            'id_tgstambahan' => ['sometimes', 'nullable'],
            'no_sk_cpns' => ['sometimes', 'nullable'],
            'tgl_sk_cpns' => ['sometimes', 'nullable'],
            'no_sk_pengangkatan' => ['sometimes', 'nullable'],
            'tmt_pengangkatan' => ['sometimes', 'nullable'],
            'lembaga_pengangkatan' => ['sometimes', 'nullable'],
            'id_pangkat' => ['sometimes', 'nullable'],
            'nama_ibu_kandung' => ['sometimes', 'required'],
            'id_statkawin' => ['sometimes', 'nullable'],
            'nama_pasangan' => ['sometimes', 'nullable'],
            'nip_pasangan' => ['sometimes', 'nullable'],
            'id_pekerjaan_pasangan' => ['sometimes', 'nullable'],
            'lisensi_kepsek' => ['sometimes', 'required'],
            'diklat_pengawas' => ['sometimes', 'required'],
            'keahlian_braille' => ['sometimes', 'required'],
            'keahlian_bahasa_isyarat' => ['sometimes', 'required'],
            'no_npwp' => ['sometimes', 'nullable'],
            'nama_wajib_pajak' => ['sometimes', 'required'],
            'kewarganegaraan' => ['sometimes', 'required'],
            'id_bank' => ['sometimes', 'nullable'],
            'id_sumber_gaji' => ['sometimes', 'nullable'],
            'no_rek_bank' => ['sometimes', 'required'],
            'rek_atas_nama' => ['sometimes', 'required'],
            'no_kk' => ['sometimes', 'required'],
            'no_karpeg' => ['sometimes', 'nullable'],
            'no_karis_karsu' => ['sometimes', 'nullable'],
            'nuks' => ['sometimes', 'nullable'],
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
        $pegawai = Pegawai::findOrFail($id);

        //kondisi untuk hapus data
        if ($pegawai) {
            $pegawai->delete(); //hapus data, jika $pegawai ada
            return redirect()->route('admin.pegawai.index')->with('success', 'Data berhasil disimpan.');
        }
        return redirect()->route('admin.pegawai.index')->with('error', 'Data gagal disimpan.');
    }

    public function pegawaiExport(){
        return Excel::download(new PegawaiExport, 'pegawai.xlsx');
    }
}
