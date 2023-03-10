<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\DistribusiObat;
use App\Models\Histori;
use App\Models\KonsumsiObat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

    public function getAlarm(Request $request)
    {
        $id = $request->id;
        $data = DistribusiObat::where('pasien_id', $id)->first(['jam', 'menit']);
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

    public function getNamaObat(Request $request)
    {
        $data = DB::table('distribusi_obats')
            ->join('obats', 'obats.id', '=', 'distribusi_obats.obat_id')
            ->where('distribusi_obats.pasien_id', $request->id)
            ->select('obats.nama')
            ->groupBy('obats.nama')
            ->get();
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

        Histori::create([
            'user_id' => $request->id,
            'histori' => 'Anda berhasil melakukan pengiriman data konsumsi obat anda dengan perincian: Konsumsi = ' . $request->konsumsi . ', Melewatkan = ' . $request->terlewati . ', Periode = ' . $request->periode . ' pada tanggal ' . date('d-m-Y')
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
