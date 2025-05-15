<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Agama;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AgamaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $agama = Agama::all();
        return response()->json([
            'status' => true,
            'message' => 'Data berhasil ditemukan',
            'data' => $agama
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'nama_agama'=>'required',
        ]);

        if($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validasi error',
                'errors' => $validator->errors()
            ], 422);   
        }
        $agama = Agama::create($request->all());
        return response()->json([
            'status' => true,
            'message' => 'Data berhasil di tambahkan',
            'data' => $agama
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $agama = Agama::findOrFail($id);
        return response()->json([
            'status' => 'true',
            'message' => 'Data berhasil ditemukan',
            'data' => $agama
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(),[
            'nama_agama'=>'required',
        ]);

        if($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validasi error',
                'errors' => $validator->errors()
            ], 422);   
        }
        $agama = Agama::findOrFail($id);
        $agama->update($request->all());
        return response()->json([
            'status' => true,
            'message' => 'Data berhasil di perbaiki',
            'data' => $agama
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $agama = Agama::findOrFail($id);
        $agama->delete();
        return response()->json([
            'status'=>true,
            'message'=>'Data berhasil di hapus'
        ], 204);
    }
}
