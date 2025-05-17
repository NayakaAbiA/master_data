<?php

namespace App\Http\Controllers\Api;

use App\Models\Kabupaten;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class KabupatenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Kabupaten::with('provinsi')->get();
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
        $kabupaten = new Kabupaten();
        $rules = [
            'kabupaten' => ['required', 'string', 'max:255', 'unique:tb_kabupaten,kabupaten'],
            'ibu_kota' => ['required', 'string', 'max:255', 'unique:tb_kabupaten,ibu_kota'],
            'k_bsni' => ['required', 'string', 'max:255', 'unique:tb_kabupaten,k_bsni'],
            'id_provinsi' => ['required', 'integer'],
        ];
        $validator = Validator::make($request->all(),$rules);
        if($validator->fails()) {
            return response()->json([
                'status'=>false,
                'message'=>'Gagal memasukan data',
                'data'=>$validator->errors()
            ]);
        }

        $kabupaten->kabupaten = $request->kabupaten;
        $kabupaten->ibu_kota = $request->ibu_kota;
        $kabupaten->k_bsni = $request->k_bsni;
        $kabupaten->id_provinsi = $request->id_provinsi;

        $post = $kabupaten->save();

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
        $data = Kabupaten::find($id);
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
        $kabupaten = Kabupaten::find($id);
        if(empty($kabupaten)){
            return response()->json([
                'status'=>false,
                'message'=>'Data tidak ditemukan'
            ], 404);
        }

        $rules = [
            'kabupaten' => ['required', 'string', 'max:255'],
            'ibu_kota' => ['required', 'string', 'max:255'],
            'k_bsni' => ['required', 'string', 'max:255'],
            'id_provinsi' => ['required', 'integer'],
        ];
        $validator = Validator::make($request->all(),$rules);
        if($validator->fails()) {
            return response()->json([
                'status'=>false,
                'message'=>'Gagal mengupdate data',
                'data'=>$validator->errors()
            ]);
        }

        $kabupaten->kabupaten = $request->kabupaten;
        $kabupaten->ibu_kota = $request->ibu_kota;
        $kabupaten->k_bsni = $request->k_bsni;
        $kabupaten->id_provinsi = $request->id_provinsi;

        $post = $kabupaten->save();

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
        $kabupaten = Kabupaten::find($id);
        if(empty($kabupaten)){
            return response()->json([
                'status'=>false,
                'message'=>'Data tidak ditemukan'
            ], 404);
        }
        $post = $kabupaten->delete();

        return response()->json([
            'status'=>true,
            'message'=>'Data berhasil di delete'
        ]);
    }
}
