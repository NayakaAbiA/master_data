<?php

namespace App\Http\Controllers\Api;

use App\Models\Sekolah;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class SekolahController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Sekolah::all();
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
        $sekolah = new Sekolah();
        $rules = [
            'npsn' => ['required', 'string', 'max:12', 'unique:tb_sekolah,npsn'],
            'nama_sekolah' => ['required', 'string', 'max:50', 'unique:tb_sekolah,nama_sekolah'],
            'jenjang' => ['required', 'string', 'max:30'],
        ];
        $validator = Validator::make($request->all(),$rules);
        if($validator->fails()) {
            return response()->json([
                'status'=>false,
                'message'=>'Gagal memasukan data',
                'data'=>$validator->errors()
            ]);
        }

        $sekolah->npsn = $request->npsn;
        $sekolah->nama_sekolah = $request->nama_sekolah;
        $sekolah->jenjang = $request->jenjang;

        $post = $sekolah->save();

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
        $data = Sekolah::find($id);
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
        $sekolah = Sekolah::find($id);
        if(empty($sekolah)){
            return response()->json([
                'status'=>false,
                'message'=>'Data tidak ditemukan'
            ], 404);
        }
        $rules = [
            'npsn' => ['required', 'string', 'max:12'],
            'nama_sekolah' => ['required', 'string', 'max:50'],
            'jenjang' => ['required', 'string', 'max:30'],
        ];
        $validator = Validator::make($request->all(),$rules);
        if($validator->fails()) {
            return response()->json([
                'status'=>false,
                'message'=>'Gagal memasukan data',
                'data'=>$validator->errors()
            ]);
        }

        $sekolah->npsn = $request->npsn;
        $sekolah->nama_sekolah = $request->nama_sekolah;
        $sekolah->jenjang = $request->jenjang;

        $post = $sekolah->save();

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
        $sekolah = Sekolah::find($id);
        if(empty($sekolah)){
            return response()->json([
                'status'=>false,
                'message'=>'Data tidak ditemukan'
            ], 404);
        }
        $post = $sekolah->delete();

        return response()->json([
            'status'=>true,
            'message'=>'Data berhasil di delete'
        ]);
    }
}
