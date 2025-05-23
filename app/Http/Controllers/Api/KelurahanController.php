<?php

namespace App\Http\Controllers\Api;

use App\Models\Kelurahan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class KelurahanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Kelurahan::with('kecamatan')->get();
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
        $kelurahan = new Kelurahan();
        $rules = [
            'kelurahan' => ['required', 'string', 'max:255', 'unique:tb_kelurahan,kelurahan'],
            'kode_pos' => ['required', 'string', 'max:255'],
            'id_kecamatan' => ['required', 'integer'],
        ];
        $validator = Validator::make($request->all(),$rules);
        if($validator->fails()) {
            return response()->json([
                'status'=>false,
                'message'=>'Gagal memasukan data',
                'data'=>$validator->errors()
            ]);
        }

        $kelurahan->kelurahan = $request->kelurahan;
        $kelurahan->kode_pos = $request->kode_pos;
        $kelurahan->id_kecamatan = $request->id_kecamatan;

        $post = $kelurahan->save();

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
        $data = Kelurahan::find($id);
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
        $kelurahan = Kelurahan::find($id);
        if(empty($kelurahan)){
            return response()->json([
                'status'=>false,
                'message'=>'Data tidak ditemukan'
            ], 404);
        }

        $rules = [
            'kelurahan' => ['required', 'string', 'max:255'],
            'kode_pos' => ['required', 'string', 'max:255'],
            'id_kecamatan' => ['required', 'integer'],
        ];
        $validator = Validator::make($request->all(),$rules);
        if($validator->fails()) {
            return response()->json([
                'status'=>false,
                'message'=>'Gagal mengupdate data',
                'data'=>$validator->errors()
            ]);
        }

        $kelurahan->kelurahan = $request->kelurahan;
        $kelurahan->kode_pos = $request->kode_pos;
        $kelurahan->id_kecamatan = $request->id_kecamatan;

        $post = $kelurahan->save();

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
        $kelurahan = Kelurahan::find($id);
        if(empty($kelurahan)){
            return response()->json([
                'status'=>false,
                'message'=>'Data tidak ditemukan'
            ], 404);
        }
        $post = $kelurahan->delete();

        return response()->json([
            'status'=>true,
            'message'=>'Data berhasil di delete'
        ]);
    }
}
