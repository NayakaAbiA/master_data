<?php

namespace App\Http\Controllers\Api;

use App\Models\Provinsi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class ProvinsiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Provinsi::all();
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
        $provinsi = new Provinsi();
        $rules = [
            'provinsi' => ['required', 'string', 'max:225', 'unique:tb_provinsi,provinsi'],
            'ibu_kota' => ['required', 'string', 'max:225', 'unique:tb_provinsi,ibu_kota'],
            'p_bsni' => ['required', 'string', 'max:225', 'unique:tb_provinsi,p_bsni'],
        ];
        $validator = Validator::make($request->all(),$rules);
        if($validator->fails()) {
            return response()->json([
                'status'=>false,
                'message'=>'Gagal memasukan data',
                'data'=>$validator->errors()
            ]);
        }

        $provinsi->provinsi = $request->provinsi;
        $provinsi->ibu_kota = $request->ibu_kota;
        $provinsi->p_bsni = $request->p_bsni;

        $post = $provinsi->save();

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
        $data = Provinsi::find($id);
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
        $provinsi = Provinsi::find($id);
        if(empty($provinsi)){
            return response()->json([
                'status'=>false,
                'message'=>'Data tidak ditemukan'
            ], 404);
        }

        $rules = [
            'provinsi' => ['required', 'string', 'max:225'],
            'ibu_kota' => ['required', 'string', 'max:225'],
            'p_bsni' => ['required', 'string', 'max:225'],
        ];
        $validator = Validator::make($request->all(),$rules);
        if($validator->fails()) {
            return response()->json([
                'status'=>false,
                'message'=>'Gagal memasukan data',
                'data'=>$validator->errors()
            ]);
        }

        $provinsi->provinsi = $request->provinsi;
        $provinsi->ibu_kota = $request->ibu_kota;
        $provinsi->p_bsni = $request->p_bsni;

        $post = $provinsi->save();

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
        $provinsi = Provinsi::find($id);
        if(empty($provinsi)){
            return response()->json([
                'status'=>false,
                'message'=>'Data tidak ditemukan'
            ], 404);
        }
        $post = $provinsi->delete();

        return response()->json([
            'status'=>true,
            'message'=>'Data berhasil di delete'
        ]);
    }
}
