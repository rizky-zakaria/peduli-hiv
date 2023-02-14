<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Histori;
use App\Models\LaporanKondisi;
use Illuminate\Http\Request;

class LaporanKondisiController extends Controller
{
    public function getLapById(Request $request)
    {
        $id = $request->id;
        $data = LaporanKondisi::where('user_id', $id)->get();
        if ($data) {
            return response()->json([
                'success' => true,
                'message'    => 'Successfully',
                'data'    => $data,
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message'    => 'Not Found',
            ], 404);
        }
    }

    public function postLapById(Request $request)
    {
        $post = new LaporanKondisi;
        $post->user_id = $request->id;
        $post->berat = $request->berat;
        $post->efek = $request->efek;
        $post->keluhan = $request->keluhan;
        $post->save();

        Histori::create([
            'user_id' => $request->id,
            'histori' => 'Anda berhasil melakukan pengiriman data kondisi anda dengan perincian: Berat = ' . $request->berat . ', Efek samping = ' . $request->efek . ', dan Keluhan = ' . $request->keluhan . ' pada tanggal ' . date('d-m-Y')
        ]);

        if ($post) {
            return response()->json([
                'success' => true,
                'message'    => 'Successfully',
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message'    => 'Not Found',
            ], 404);
        }
    }
}
