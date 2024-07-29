<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class KategoriController extends Controller
{
    public function index()
    {
        $kategori = Kategori::all();
        $res = [
            'success' => true,
            'message' => 'Data Kategori',
            'data' => $kategori,
        ];
        return response()->json($res, 200);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_kategori' => 'required|unique:kategoris',
        ]);
        if ($validator->fails()) {
            $res = [
                'success' => false,
                'message' => 'Validasi Gagal',
                'errors' => $validator->errors(),
            ];
            return response()->json($res, 422);
        }

        try {
            $kategori = new Kategori();
            $kategori->nama_kategori = $request->nama_kategori;
            $kategori->slug = Str::slug($request->nama_kategori);
            $kategori->save();
            $res = [
                'success' => true,
                'message' => 'Data Kategori Tersimpan',
                'data' => $kategori,
            ];
            return response()->json($res, 200);
        } catch (\Exception $e) {
            $res = [
                'success' => false,
                'message' => 'Terjadi kesalahan',
                'errors' => $e->getMessage(),
            ];
            return response()->json($res, 500);
        }
    }

    public function show($id)
    {
        try {
            $kategori = Kategori::findOrFail($id);
            return response()->json([
                'success' => true,
                'message' => 'detail kategori',
                'data' => $kategori,
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'detail kategori',
                'errors' => $e->getMessage(),
            ], 404);

        }
    }
}
