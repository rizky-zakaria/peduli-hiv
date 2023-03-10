<?php

namespace App\Http\Controllers;

use App\Models\Biodata;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LandingController extends Controller
{
    public function index()
    {
        $tahun = DB::table('biodatas')
            ->select('tahun_lapor', DB::raw('count(*) as total'))
            ->groupBy('tahun_lapor')
            ->get();
        $jk = DB::table('biodatas')
            ->select('jk', DB::raw('count(*) as total'))
            ->groupBy('jk')
            ->get();
        $pekerjaan = DB::table('biodatas')
            ->select('pekerjaan', DB::raw('count(*) as total'))
            ->groupBy('pekerjaan')
            ->get();
        $fungsional = DB::table('biodatas')
            ->select('fungsional', DB::raw('count(*) as total'))
            ->groupBy('fungsional')
            ->get();
        $jenis = DB::table('biodatas')
            ->select('jenis', DB::raw('count(*) as total'))
            ->groupBy('jenis')
            ->get();
        $domisili = DB::table('biodatas')
            ->select('domisili', DB::raw('count(*) as total'))
            ->groupBy('domisili')
            ->get();
        return view('landing.index', compact('tahun', 'jk', 'pekerjaan', 'fungsional', 'jenis', 'domisili'));
    }
}
