<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\TgsTambahan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TgsTambahanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = TgsTambahan::all();
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
        $tgstambahan = new TgsTambahan;
        $rules = [
            'tgs_tambahan' => ['sometimes', 'required', 'string', 'max:40', 'unique:tb_tgstambahan,tgs_tambahan'],
        ];
        $validator = Validator::make($request->all(),$rules);
        if($validator->fails()) {
            return response()->json([
                'status'=>false,
                'message'=>'Gagal memasukan data',
                'data'=>$validator->errors()
            ]);
        }

        $tgstambahan->tgs_tambahan = $request->tgs_tambahan;

        $post = $tgstambahan->save();

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
        $data = TgsTambahan::find($id);
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
        $tgstambahan = TgsTambahan::find($id);
        if(empty($tgstambahan)){
            return response()->json([
                'status'=>false,
                'message'=>'Data tidak ditemukan'
            ], 404);
        }

        $rules = [
            'tgs_tambahan' => ['sometimes', 'required', 'string', 'max:40', 'unique:tb_tgstambahan,tgs_tambahan'],
        ];
        $validator = Validator::make($request->all(),$rules);
        if($validator->fails()) {
            return response()->json([
                'status'=>false,
                'message'=>'Gagal update data',
                'data'=>$validator->errors()
            ]);
        }

        $tgstambahan->tgs_tambahan = $request->tgs_tambahan;

        $post = $tgstambahan->save();

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
        $tgstambahan = TgsTambahan::find($id);
        if(empty($tgstambahan)){
            return response()->json([
                'status'=>false,
                'message'=>'Data tidak ditemukan'
            ], 404);
        }
        $post = $tgstambahan->delete();

        return response()->json([
            'status'=>true,
            'message'=>'Data berhasil di delete'
        ]);
    }
}
