<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
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
        $post->tinggi = $request->tinggi;
        $post->keluhan = $request->keluhan;
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
