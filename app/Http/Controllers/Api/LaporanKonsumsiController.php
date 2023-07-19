<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\DistribusiObat;
use App\Models\Histori;
use App\Models\KonsumsiObat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;
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
        $data = DistribusiObat::join('obats', 'obats.id', '=', 'distribusi_obats.obat_id')
            ->where('pasien_id', $request->id)
            ->orderBy('distribusi_obats.created_at', 'desc')
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
        $cek = KonsumsiObat::where('periode', date('M-Y'))
            ->where('pasien_id', $request->id)
            ->get();
        if (count($cek) > 0) {
            return response()->json([
                'success' => false,
                'message'    => 'Gagal input data',
            ], 404);
        }

        $data = DistribusiObat::join('obats', 'obats.id', '=', 'distribusi_obats.obat_id')
            ->where('pasien_id', $request->id)
            ->orderBy('distribusi_obats.created_at', 'desc')
            ->first(['obats.nama', 'obats.jenis', 'distribusi_obats.dosis', 'distribusi_obats.jam', 'distribusi_obats.menit', 'distribusi_obats.jumlah']);

        $post = new KonsumsiObat;
        $post->pasien_id = $request->id;
        $post->konsumsi = $request->konsumsi;
        $post->terlewati = $data->jumlah - $request->konsumsi;
        $post->periode = date('M-Y');
        $post->kepatuhan = number_format($request->konsumsi * 100 / $data->jumlah, 2);
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

    public function getDetailKonsumsi(Request $request)
    {
        $post = DistribusiObat::join('obats', 'obats.id', '=', 'distribusi_obats.obat_id')
            ->where('pasien_id', $request->id)
            ->orderBy('distribusi_obats.created_at', 'desc')
            ->first(['obats.nama', 'obats.jenis', 'distribusi_obats.dosis', 'distribusi_obats.jam', 'distribusi_obats.menit', 'distribusi_obats.jumlah']);
        if ($post) {
            return response()->json([
                'success' => true,
                'message'    => 'Successfully',
                'data' => $post
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message'    => 'Not Found',
            ], 404);
        }
    }
}
