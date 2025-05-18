<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\StatPegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StatusPegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = StatPegawai::all();
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
        $statpegawai = new StatPegawai;
        $rules = [
            'stat_peg' => ['sometimes', 'required', 'string', 'max:30', 'unique:tb_stat_pegawai,stat_peg'],
        ];
        $validator = Validator::make($request->all(),$rules);
        if($validator->fails()) {
            return response()->json([
                'status'=>false,
                'message'=>'Gagal memasukan data',
                'data'=>$validator->errors()
            ]);
        }

        $statpegawai->stat_peg = $request->stat_peg;

        $post = $statpegawai->save();

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
        $data = StatPegawai::find($id);
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
        $statpegawai = StatPegawai::find($id);
        if(empty($statpegawai)){
            return response()->json([
                'status'=>false,
                'message'=>'Data tidak ditemukan'
            ], 404);
        }

        $rules = [
            'stat_peg' => ['sometimes', 'required', 'string', 'max:30', 'unique:tb_stat_pegawai,stat_peg'],
        ];
        $validator = Validator::make($request->all(),$rules);
        if($validator->fails()) {
            return response()->json([
                'status'=>false,
                'message'=>'Gagal update data',
                'data'=>$validator->errors()
            ]);
        }

        $statpegawai->stat_peg = $request->stat_peg;

        $post = $statpegawai->save();

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
        $statpegawai = StatPegawai::find($id);
        if(empty($statpegawai)){
            return response()->json([
                'status'=>false,
                'message'=>'Data tidak ditemukan'
            ], 404);
        }
        $post = $statpegawai->delete();

        return response()->json([
            'status'=>true,
            'message'=>'Data berhasil di delete'
        ]);
    }
}

