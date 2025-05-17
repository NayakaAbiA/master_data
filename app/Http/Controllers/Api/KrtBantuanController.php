<?php

namespace App\Http\Controllers\Api;

use App\Models\KrtBantuan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class KrtBantuanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = KrtBantuan::all();
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
        $krtbantuan = new KrtBantuan();
        $rules = [
            'no_krtbantuan' => ['required', 'string', 'max:15', 'unique:tb_krtbantuan,no_krtbantuan'],
            'nama_krtbantuan' => ['required', 'string', 'max:15', 'unique:tb_krtbantuan,nama_krtbantuan'],
            'nama_pdkrt' => ['required', 'string', 'max:40', 'unique:tb_krtbantuan,nama_pdkrt'],
        ];
        $validator = Validator::make($request->all(),$rules);
        if($validator->fails()) {
            return response()->json([
                'status'=>false,
                'message'=>'Gagal memasukan data',
                'data'=>$validator->errors()
            ]);
        }

        $krtbantuan->no_krtbantuan = $request->no_krtbantuan;
        $krtbantuan->nama_krtbantuan = $request->nama_krtbantuan;
        $krtbantuan->nama_pdkrt = $request->nama_pdkrt;

        $post = $krtbantuan->save();

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
        $data = KrtBantuan::find($id);
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
        $krtbantuan = KrtBantuan::find($id);
        if(empty($krtbantuan)){
            return response()->json([
                'status'=>false,
                'message'=>'Data tidak ditemukan'
            ], 404);
        }

        $rules = [
            'no_krtbantuan' => ['required', 'string', 'max:15'],
            'nama_krtbantuan' => ['required', 'string', 'max:15'],
            'nama_pdkrt' => ['required', 'string', 'max:40'],
        ];
        $validator = Validator::make($request->all(),$rules);
        if($validator->fails()) {
            return response()->json([
                'status'=>false,
                'message'=>'Gagal mengupdate data',
                'data'=>$validator->errors()
            ]);
        }

        $krtbantuan->no_krtbantuan = $request->no_krtbantuan;
        $krtbantuan->nama_krtbantuan = $request->nama_krtbantuan;
        $krtbantuan->nama_pdkrt = $request->nama_pdkrt;

        $post = $krtbantuan->save();

        return response()->json([
            'status'=>true,
            'message'=>'Data berhasil di update'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $krtbantuan = KrtBantuan::find($id);
        if(empty($krtbantuan)){
            return response()->json([
                'status'=>false,
                'message'=>'Data tidak ditemukan'
            ], 404);
        }
        $post = $krtbantuan->delete();

        return response()->json([
            'status'=>true,
            'message'=>'Data berhasil di delete'
        ]);
    }
}
