<?php

namespace App\Http\Controllers\Api;

use App\Models\Perbaikan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class PerbaikanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Perbaikan::with('user')->latest()->get();
        return response()->json([
            'status' => true,
            'message' => 'Data berhasil ditemukan',
            'data' => $data
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'jenis' => 'required|in:Pribadi,Kelas',
            'deskripsi' => 'required|string',
            'lampiran' => 'nullable|file|mimes:pdf,jpg,jpeg,png,doc,docx|max:2048',
            'user_id' => 'required|exists:users,id'
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Gagal menyimpan data',
                'data' => $validator->errors()
            ]);
        }

        $perbaikan = new Perbaikan();
        $perbaikan->jenis = $request->jenis;
        $perbaikan->deskripsi = $request->deskripsi;
        $perbaikan->user_id = $request->user_id;
        $perbaikan->status = 'Menunggu';

        if ($request->hasFile('lampiran')) {
            $perbaikan->lampiran = $request->file('lampiran')->store('lampiran', 'public');
        }

        $perbaikan->save();

        return response()->json([
            'status' => true,
            'message' => 'Data berhasil ditambahkan',
            'data' => $perbaikan
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $perbaikan = Perbaikan::with('user')->find($id);
        if ($perbaikan) {
            return response()->json([
                'status' => true,
                'message' => 'Data berhasil ditemukan',
                'data' => $perbaikan
            ], 200);
        }

        return response()->json([
            'status' => false,
            'message' => 'Data tidak ditemukan'
        ], 404);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $perbaikan = Perbaikan::find($id);
        if (!$perbaikan) {
            return response()->json([
                'status' => false,
                'message' => 'Data tidak ditemukan'
            ], 404);
        }

        $rules = [
            'status' => 'required|in:Menunggu,Disetujui,Ditolak',
            'lampiran' => 'nullable|file|mimes:pdf,jpg,jpeg,png,doc,docx|max:2048'
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Gagal mengupdate data',
                'data' => $validator->errors()
            ]);
        }

        if ($request->hasFile('lampiran')) {
            if ($perbaikan->lampiran && Storage::disk('public')->exists($perbaikan->lampiran)) {
                Storage::disk('public')->delete($perbaikan->lampiran);
            }

            $perbaikan->lampiran = $request->file('lampiran')->store('lampiran', 'public');
        }

        $perbaikan->status = $request->status;
        $perbaikan->save();

        return response()->json([
            'status' => true,
            'message' => 'Data berhasil diperbarui',
            'data' => $perbaikan
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $perbaikan = Perbaikan::find($id);
        if (!$perbaikan) {
            return response()->json([
                'status' => false,
                'message' => 'Data tidak ditemukan'
            ], 404);
        }

        if ($perbaikan->lampiran && Storage::disk('public')->exists($perbaikan->lampiran)) {
            Storage::disk('public')->delete($perbaikan->lampiran);
        }

        $perbaikan->delete();

        return response()->json([
            'status' => true,
            'message' => 'Data berhasil dihapus'
        ]);
    }
}
