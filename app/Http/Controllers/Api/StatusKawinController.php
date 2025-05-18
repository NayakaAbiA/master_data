<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\StatKawin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StatusKawinController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = StatKawin::all();
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
        $statkawin = new StatKawin;
        $rules = [
            'status_kawin' => ['sometimes', 'required', 'string', 'max:30', 'unique:tb_statkawin,status_kawin'],
        ];
        $validator = Validator::make($request->all(),$rules);
        if($validator->fails()) {
            return response()->json([
                'status'=>false,
                'message'=>'Gagal memasukan data',
                'data'=>$validator->errors()
            ]);
        }

        $statkawin->status_kawin = $request->status_kawin;

        $post = $statkawin->save();

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
        $data = StatKawin::find($id);
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
        $statkawin = StatKawin::find($id);
        if(empty($statkawin)){
            return response()->json([
                'status'=>false,
                'message'=>'Data tidak ditemukan'
            ], 404);
        }

        $rules = [
            'status_kawin' => ['sometimes', 'required', 'string', 'max:30', 'unique:tb_statkawin,status_kawin'],
        ];
        $validator = Validator::make($request->all(),$rules);
        if($validator->fails()) {
            return response()->json([
                'status'=>false,
                'message'=>'Gagal update data',
                'data'=>$validator->errors()
            ]);
        }

        $statkawin->status_kawin = $request->status_kawin;

        $post = $statkawin->save();

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
        $statkawin = StatKawin::find($id);
        if(empty($statkawin)){
            return response()->json([
                'status'=>false,
                'message'=>'Data tidak ditemukan'
            ], 404);
        }
        $post = $statkawin->delete();

        return response()->json([
            'status'=>true,
            'message'=>'Data berhasil di delete'
        ]);
    }
}
