<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Siswa::with([
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
        return response()->json([
            'status'=>true,
            'message'=>'Data di temukan',
            'data'=>$data
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
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
            'email' => ['sometimes', 'required', 'email', 'max:50', 'unique:tb_siswa,email'],
            'anak_ke' => ['sometimes', 'required', 'integer', 'min:1'],
            'jml_saudara_kandung' => ['sometimes', 'nullable', 'integer', 'min:0'],
            'berat_badan' => ['sometimes', 'required', 'numeric', 'min:1'],
            'tinggi_badan' => ['sometimes', 'required', 'numeric', 'min:1'],
            'lingkar_kepala' => ['sometimes', 'required', 'numeric', 'min:1'],
            'kewarganegaraan' => ['sometimes', 'required', 'string', 'max:25'],
            'Jalan' => ['sometimes', 'required', 'string', 'max:40'],
            'no_rumah' => ['sometimes', 'required', 'string', 'max:4'],
            'RT' => ['sometimes', 'required', 'string', 'max:4'],
            'RW' => ['sometimes', 'required', 'string', 'max:4'],
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
            'nopes_un' => ['sometimes', 'required', 'string', 'max:35'],
            'no_seri_ijazah' => ['sometimes', 'nullable', 'string', 'max:35'],
            'id_krt_bantuan' => ['sometimes', 'nullable', 'integer'],
            'nama_pada_kartu' => ['sometimes', 'required', 'string', 'max:100'],
            'id_bank' => ['sometimes', 'nullable', 'integer'],
            'no_rek_bank' => ['sometimes', 'nullable', 'string', 'max:50'],
            'rek_atas_nama' => ['sometimes', 'nullable', 'string', 'max:100'],
            'layak_bantuan' => ['sometimes', 'required', 'in:0,1'],
            'id_prgbantuan' => ['sometimes', 'nullable', 'integer'],
            'alasan_layak' => ['sometimes', 'required', 'string', 'max:255'],
            'id_kebkhusus' => ['sometimes', 'nullable', 'integer'],
            'Stat_siswa' => ['sometimes', 'required', 'string', 'max:20'],
            'pindahan' => ['sometimes', 'required', 'in:0,1'],
        ];
        $validator = Validator::make($request->all(),$rules);
        if($validator->fails()) {
            return response()->json([
                'status'=>false,
                'message'=>'Gagal memasukan data',
                'data'=>$validator->errors()
            ]);
        }
        $siswa = new Siswa();
        $siswa->fill($request->all());

        $siswa->save();

        return response()->json([
            'status'=>true,
            'message'=>'Data berhasil di tambahkan'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Siswa::find($id);
        if ($data) {
            return response()->json([
                'status'=>true,
                'message'=>'Data berhasil di temukan',
                'data'=>$data
            ], 200);
        } else {
            return response()->json([
                'status'=>false,
                'message'=>'Data tidak di temukan'
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $rules = [
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
            'email' => ['sometimes', 'required', 'email', 'max:50', 'unique:tb_siswa,email'],
            'anak_ke' => ['sometimes', 'required', 'integer', 'min:1'],
            'jml_saudara_kandung' => ['sometimes', 'nullable', 'integer', 'min:0'],
            'berat_badan' => ['sometimes', 'required', 'numeric', 'min:1'],
            'tinggi_badan' => ['sometimes', 'required', 'numeric', 'min:1'],
            'lingkar_kepala' => ['sometimes', 'required', 'numeric', 'min:1'],
            'kewarganegaraan' => ['sometimes', 'required', 'string', 'max:25'],
            'Jalan' => ['sometimes', 'required', 'string', 'max:40'],
            'no_rumah' => ['sometimes', 'required', 'string', 'max:4'],
            'RT' => ['sometimes', 'required', 'string', 'max:4'],
            'RW' => ['sometimes', 'required', 'string', 'max:4'],
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
            'nopes_un' => ['sometimes', 'required', 'string', 'max:35'],
            'no_seri_ijazah' => ['sometimes', 'nullable', 'string', 'max:35'],
            'id_krt_bantuan' => ['sometimes', 'nullable', 'integer'],
            'nama_pada_kartu' => ['sometimes', 'required', 'string', 'max:100'],
            'id_bank' => ['sometimes', 'nullable', 'integer'],
            'no_rek_bank' => ['sometimes', 'nullable', 'string', 'max:50'],
            'rek_atas_nama' => ['sometimes', 'nullable', 'string', 'max:100'],
            'layak_bantuan' => ['sometimes', 'required', 'in:0,1'],
            'id_prgbantuan' => ['sometimes', 'nullable', 'integer'],
            'alasan_layak' => ['sometimes', 'required', 'string', 'max:255'],
            'id_kebkhusus' => ['sometimes', 'nullable', 'integer'],
            'Stat_siswa' => ['sometimes', 'required', 'string', 'max:20'],
            'pindahan' => ['sometimes', 'required', 'in:0,1'],
        ];
        $validator = Validator::make($request->all(),$rules);
        if($validator->fails()) {
            return response()->json([
                'status'=>false,
                'message'=>'Gagal memasukan data',
                'data'=>$validator->errors()
            ]);
        }
        $siswa = Siswa::findOrFail($id);
        $siswa->fill($request->all());

        $siswa->save();

        return response()->json([
            'status'=>true,
            'message'=>'Data berhasil di tambahkan'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $siswa = Siswa::find($id);
        if(empty($siswa)){
            return response()->json([
                'status'=>false,
                'message'=>'Data tidak ditemukan'
            ], 404);
        }
        $post = $siswa->delete();

        return response()->json([
            'status'=>true,
            'message'=>'Data berhasil di delete'
        ]);
    }
}
