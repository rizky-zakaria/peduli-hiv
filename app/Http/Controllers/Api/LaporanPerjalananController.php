<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Histori;
use App\Models\Kunjungan;
use App\Models\LaporanPerjalanan;
use Illuminate\Http\Request;

class LaporanPerjalananController extends Controller
{
    public function getLapById(Request $request)
    {
        $data = LaporanPerjalanan::where('pasien_id', $request->id)->get();
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
        $post = new LaporanPerjalanan;
        $post->pasien_id = $request->id;
        $post->tgl_kunjungan = $request->tgl_kunjungan;
        $post->tgl_pulang = $request->tgl_pulang;
        $post->tujuan = $request->tujuan;
        $post->keterangan = $request->keterangan;
        $post->save();

        Histori::create([
            'user_id' => $request->id,
            'histori' => 'Anda berhasil melakukan pengiriman data perjalanan anda dengan perincian: Tujuan = ' . $request->keterangan . ', dalam agenda = ' . $request->tujuan . ', dengan waktu keberangkatan = ' . $request->tgl_kunjungan . '-' . $request->tgl_pulang . ' pada tanggal ' . date('d-m-Y')
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
