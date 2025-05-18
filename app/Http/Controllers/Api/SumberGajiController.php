<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\SumberGaji;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SumberGajiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = SumberGaji::all();
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
        $sumbergaji = new SumberGaji;
        $rules = [
            'sumber_gaji' => ['sometimes', 'required', 'string', 'max:25', 'unique:tb_sumber_gaji,sumber_gaji'],
        ];
        $validator = Validator::make($request->all(),$rules);
        if($validator->fails()) {
            return response()->json([
                'status'=>false,
                'message'=>'Gagal memasukan data',
                'data'=>$validator->errors()
            ]);
        }

        $sumbergaji->sumber_gaji = $request->sumber_gaji;

        $post = $sumbergaji->save();

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
        $data = SumberGaji::find($id);
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
        $sumbergaji = SumberGaji::find($id);
        if(empty($sumbergaji)){
            return response()->json([
                'status'=>false,
                'message'=>'Data tidak ditemukan'
            ], 404);
        }

        $rules = [
            'sumber_gaji' => ['sometimes', 'required', 'string', 'max:25', 'unique:tb_sumber_gaji,sumber_gaji'],
        ];
        $validator = Validator::make($request->all(),$rules);
        if($validator->fails()) {
            return response()->json([
                'status'=>false,
                'message'=>'Gagal update data',
                'data'=>$validator->errors()
            ]);
        }

        $sumbergaji->sumber_gaji = $request->sumber_gaji;

        $post = $sumbergaji->save();

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
        $sumbergaji = SumberGaji::find($id);
        if(empty($sumbergaji)){
            return response()->json([
                'status'=>false,
                'message'=>'Data tidak ditemukan'
            ], 404);
        }
        $post = $sumbergaji->delete();

        return response()->json([
            'status'=>true,
            'message'=>'Data berhasil di delete'
        ]);
    }
}
