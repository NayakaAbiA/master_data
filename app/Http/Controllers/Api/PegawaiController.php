<?php

namespace App\Http\Controllers\Api;

use App\Models\Pegawai;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Pegawai::with([
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
        ]);
    
        $query = Pegawai::query();

        // Filter berdasarkan role pegawai
        if (Auth::check() && Auth::user()->role === 'pegawai') {
            $query->where('ptk_id', Auth::user()->ptk_id);
        }

        // Filter tambahan dari query params
        if ($request->filled('jenis_kelamin')) {
            $query->where('jenis_kelamin', $request->jenis_kelamin);
        }

        if ($request->filled('stat_peg')) {
            $query->where('stat_peg', $request->stat_peg);
        }

        $pegawai = $query->get();

        // Kirim response JSON
        return response()->json([
            'success' => true,
            'data' => $pegawai
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'nama' => ['required', 'string', 'max:100'],
            'NIK' => ['required', 'digits:16', 'unique:tb_ptk,NIK'],
            'NIP' => ['nullable', 'string', 'max:18'],
            'NUPTK' => ['nullable', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:50', 'unique:tb_ptk,email'],
            'jenis_kelamin' => ['required', 'string', 'max:10'],
            'tempat_lahir' => ['required', 'string', 'max:30'],
            'tgl_lahir' => ['required', 'date'],
            'id_stat_peg' => ['nullable', 'integer'],
            'id_jns_ptk' => ['nullable', 'integer'],
            'id_agama' => ['nullable', 'integer'],
            'Jalan' => ['required', 'string', 'max:40'],
            'No_rumah' => ['required', 'string', 'max:4'],
            'RT' => ['required', 'string', 'max:4'],
            'RW' => ['required', 'string', 'max:4'],
            'id_provinsi' => ['nullable', 'integer'],
            'id_kabupaten' => ['nullable', 'integer'],
            'id_kecamatan' => ['nullable', 'integer'],
            'id_kelurahan' => ['nullable', 'integer'],
            'kode_pos' => ['required', 'digits:5'],
            'no_telepon' => ['nullable', 'string', 'max:15'],
            'hp' => ['required', 'string', 'max:15'],
            'lintang' => ['nullable', 'string', 'max:50'],
            'bujur' => ['nullable', 'string', 'max:50'],
            'id_tgstambahan' => ['nullable', 'integer'],
            'no_sk_cpns' => ['nullable', 'string', 'max:100'],
            'tgl_sk_cpns' => ['nullable', 'date'],
            'no_sk_pengangkatan' => ['nullable', 'string', 'max:100'],
            'tmt_pengangkatan' => ['nullable', 'date'],
            'lembaga_pengangkatan' => ['nullable', 'string', 'max:20'],
            'id_pangkat' => ['nullable', 'integer'],
            'nama_ibu_kandung' => ['required', 'string', 'max:50'],
            'id_statkawin' => ['nullable', 'integer'],
            'nama_pasangan' => ['nullable', 'string', 'max:50'],
            'nip_pasangan' => ['nullable', 'string', 'max:18'],
            'id_pekerjaan_pasangan' => ['nullable', 'integer'],
            'lisensi_kepsek' => ['required', 'in:0,1'],
            'diklat_pengawas' => ['required', 'in:0,1'],
            'keahlian_braille' => ['required', 'in:0,1'],
            'keahlian_bahasa_isyarat' => ['required', 'in:0,1'],
            'no_npwp' => ['nullable', 'string', 'max:25'],
            'nama_wajib_pajak' => ['required', 'string', 'max:50'],
            'kewarganegaraan' => ['required', 'string', 'max:25'],
            'id_bank' => ['nullable', 'integer'],
            'id_sumber_gaji' => ['nullable', 'integer'],
            'no_rek_bank' => ['required', 'string', 'max:50'],
            'rek_atas_nama' => ['required', 'string', 'max:100'],
            'no_kk' => ['required', 'digits:16'],
            'no_karpeg' => ['nullable', 'string', 'max:8'],
            'no_karis_karsu' => ['nullable', 'string', 'max:11'],
            'nuks' => ['nullable', 'string', 'max:15'],
        ];
        $validator = Validator::make($request->all(),$rules);
        if($validator->fails()) {
            return response()->json([
                'status'=>false,
                'message'=>'Gagal memasukan data',
                'data'=>$validator->errors()
            ]);
        }
        $pegawai = new Pegawai();
        $pegawai->fill($request->all());

        $pegawai->save();

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
        $data = Pegawai::find($id);
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
            'nama' => ['required', 'string', 'max:100'],
            'NIK' => ['required', 'digits:16', 'unique:tb_ptk,NIK'],
            'NIP' => ['nullable', 'string', 'max:18'],
            'NUPTK' => ['nullable', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:50', 'unique:tb_ptk,email'],
            'jenis_kelamin' => ['required', 'string', 'max:10'],
            'tempat_lahir' => ['required', 'string', 'max:30'],
            'tgl_lahir' => ['required', 'date'],
            'id_stat_peg' => ['nullable', 'integer'],
            'id_jns_ptk' => ['nullable', 'integer'],
            'id_agama' => ['nullable', 'integer'],
            'Jalan' => ['required', 'string', 'max:40'],
            'No_rumah' => ['required', 'string', 'max:4'],
            'RT' => ['required', 'string', 'max:4'],
            'RW' => ['required', 'string', 'max:4'],
            'id_provinsi' => ['nullable', 'integer'],
            'id_kabupaten' => ['nullable', 'integer'],
            'id_kecamatan' => ['nullable', 'integer'],
            'id_kelurahan' => ['nullable', 'integer'],
            'kode_pos' => ['required', 'digits:5'],
            'no_telepon' => ['nullable', 'string', 'max:15'],
            'hp' => ['required', 'string', 'max:15'],
            'lintang' => ['nullable', 'string', 'max:50'],
            'bujur' => ['nullable', 'string', 'max:50'],
            'id_tgstambahan' => ['nullable', 'integer'],
            'no_sk_cpns' => ['nullable', 'string', 'max:100'],
            'tgl_sk_cpns' => ['nullable', 'date'],
            'no_sk_pengangkatan' => ['nullable', 'string', 'max:100'],
            'tmt_pengangkatan' => ['nullable', 'date'],
            'lembaga_pengangkatan' => ['nullable', 'string', 'max:20'],
            'id_pangkat' => ['nullable', 'integer'],
            'nama_ibu_kandung' => ['required', 'string', 'max:50'],
            'id_statkawin' => ['nullable', 'integer'],
            'nama_pasangan' => ['nullable', 'string', 'max:50'],
            'nip_pasangan' => ['nullable', 'string', 'max:18'],
            'id_pekerjaan_pasangan' => ['nullable', 'integer'],
            'lisensi_kepsek' => ['required', 'in:0,1'],
            'diklat_pengawas' => ['required', 'in:0,1'],
            'keahlian_braille' => ['required', 'in:0,1'],
            'keahlian_bahasa_isyarat' => ['required', 'in:0,1'],
            'no_npwp' => ['nullable', 'string', 'max:25'],
            'nama_wajib_pajak' => ['required', 'string', 'max:50'],
            'kewarganegaraan' => ['required', 'string', 'max:25'],
            'id_bank' => ['nullable', 'integer'],
            'id_sumber_gaji' => ['nullable', 'integer'],
            'no_rek_bank' => ['required', 'string', 'max:50'],
            'rek_atas_nama' => ['required', 'string', 'max:100'],
            'no_kk' => ['required', 'digits:16'],
            'no_karpeg' => ['nullable', 'string', 'max:8'],
            'no_karis_karsu' => ['nullable', 'string', 'max:11'],
            'nuks' => ['nullable', 'string', 'max:15'],
        ];
        $validator = Validator::make($request->all(),$rules);
        if($validator->fails()) {
            return response()->json([
                'status'=>false,
                'message'=>'Gagal memasukan data',
                'data'=>$validator->errors()
            ]);
        }
        $pegawai = Pegawai::findOrFail($id);
        $pegawai->fill($request->all());

        $pegawai->save();

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
        $pegawai = Pegawai::find($id);
        if(empty($pegawai)){
            return response()->json([
                'status'=>false,
                'message'=>'Data tidak ditemukan'
            ], 404);
        }
        $post = $pegawai->delete();

        return response()->json([
            'status'=>true,
            'message'=>'Data berhasil di delete'
        ]);
    }
}
