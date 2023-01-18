<?php

namespace App\Http\Controllers;

use App\Models\HistoriObat;
use App\Models\Obat;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function dikes()
    {
        $faskes = count(User::where('role', 'faskes')->get());
        $obat = count(Obat::all());
        $jenis = count(Obat::all());
        $pasien = count(User::where('role', 'pasien')->get());
        $historyObat = HistoriObat::limit(10)->get();
        return view('home.index', compact('faskes', 'obat', 'pasien', 'jenis', 'historyObat'));
    }

    public function faskes()
    {
        $faskes = count(User::where('role', 'faskes')->get());
        $obat = count(Obat::all());
        $jenis = count(Obat::all());
        $pasien = count(User::where('role', 'fasien')->get());
        $historyObat = HistoriObat::limit(10)->get();
        return view('home.index', compact('faskes', 'obat', 'pasien', 'jenis', 'historyObat'));
    }

    public function pasien()
    {
        $faskes = count(User::where('role', 'faskes')->get());
        $obat = count(Obat::all());
        $jenis = count(Obat::all());
        $pasien = count(User::where('role', 'fasien')->get());
        return view('home.index', compact('faskes', 'obat', 'pasien', 'jenis'));
    }
}
