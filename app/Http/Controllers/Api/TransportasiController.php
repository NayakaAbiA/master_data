<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Transportasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TransportasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Transportasi::all();
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
        $datatransportasi = new Transportasi;
        $rules = [
            'alat_transport' => ['sometimes', 'required', 'string', 'max:40', 'unique:tb_transport,alat_transport'],
        ];
        $validator = Validator::make($request->all(),$rules);
        if($validator->fails()) {
            return response()->json([
                'status'=>false,
                'message'=>'Gagal memasukan data',
                'data'=>$validator->errors()
            ]);
        }

        $datatransportasi->alat_transport = $request->alat_transport;

        $post = $datatransportasi->save();

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
        $data = Transportasi::find($id);
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
        $datatransportasi = Transportasi::find($id);
        if(empty($datatransportasi)){
            return response()->json([
                'status'=>false,
                'message'=>'Data tidak ditemukan'
            ], 404);
        }

        $rules = [
            'alat_transport' => ['sometimes', 'required', 'string', 'max:40', 'unique:tb_transport,alat_transport'],
        ];
        $validator = Validator::make($request->all(),$rules);
        if($validator->fails()) {
            return response()->json([
                'status'=>false,
                'message'=>'Gagal update data',
                'data'=>$validator->errors()
            ]);
        }

        $datatransportasi->alat_transport = $request->alat_transport;

        $post = $datatransportasi->save();

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
        $datatransportasi = Transportasi::find($id);
        if(empty($datatransportasi)){
            return response()->json([
                'status'=>false,
                'message'=>'Data tidak ditemukan'
            ], 404);
        }
        $post = $datatransportasi->delete();

        return response()->json([
            'status'=>true,
            'message'=>'Data berhasil di delete'
        ]);
    }
}
