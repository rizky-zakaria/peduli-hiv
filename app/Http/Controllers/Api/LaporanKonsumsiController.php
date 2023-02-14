<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\KonsumsiObat;
use Illuminate\Http\Request;

class LaporanKonsumsiController extends Controller
{
    public function getLapById(Request $request)
    {
        $id = $request->id;
        $data = KonsumsiObat::where('pasien_id', $id)->get();
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
        $post = new KonsumsiObat;
        $post->pasien_id = $request->id;
        $post->konsumsi = $request->konsumsi;
        $post->terlewati = $request->terlewati;
        $post->periode = $request->periode;
        $post->kepatuhan = number_format($request->konsumsi / ($request->konsumsi + $request->terlewati) * 100, 2);
        $post->save();

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
