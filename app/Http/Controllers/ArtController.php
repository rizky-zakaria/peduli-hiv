<?php

namespace App\Http\Controllers;

use App\Models\KonsumsiObat;
use App\Models\User;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArtController extends Controller
{

    public function index()
    {
        return view('data.index');
    }

    public function artById($id)
    {
        $biodata = User::join('biodatas', 'biodatas.pasien_id', '=', 'users.id')->where('users.id', $id)->first();
        $birthDate = new DateTime($biodata->tgl_lahir);
        $today = new DateTime("today");
        if ($birthDate > $today) {
            exit("0 tahun 0 bulan 0 hari");
        }
        $y = $today->diff($birthDate)->y;
        $m = $today->diff($birthDate)->m;
        $d = $today->diff($birthDate)->d;
        $umur = $y . " tahun " . $m . " bulan " . $d . " hari";

        $konsumsi = KonsumsiObat::where('periode', date('m'))->first();

        $kalender = CAL_GREGORIAN;
        $bulan = date('m');
        $tahun = date('Y');
        $hari = cal_days_in_month($kalender, $bulan, $tahun);

        if ($konsumsi == null) {
            $adher = 0 * 100 / $hari;
        } else {
            $adher = $konsumsi->konsumsi * 100 / $hari;
        }

        return view('data.art', compact('biodata', 'umur', 'adher'));
    }

    public function getArt(Request $request)
    {
        if (Auth::user()->role === 'dikes') {
            $biodata = User::join('biodatas', 'biodatas.pasien_id', '=', 'users.id')
                ->join('clusters', 'clusters.pasien_id', '=', 'users.id')
                ->join('konsumsi_obats', 'konsumsi_obats.pasien_id', '=', 'users.id')
                ->join('kondisis', 'kondisis.pasien_id', '=', 'users.id')
                ->where('kondisis.periode', $request->periode)
                ->get();
            $periode = $request->periode;
            if ($biodata) {
                return view('data.art', compact('biodata', 'periode'));
            } else {
                toast('Tidak ada data pada bulan ini!', 'error');
                return redirect(route('art.index'));
            }
        } elseif (Auth::user()->role === 'faskes') {
            $biodata = User::join('biodatas', 'biodatas.pasien_id', '=', 'users.id')
                ->join('clusters', 'clusters.pasien_id', '=', 'users.id')
                ->join('konsumsi_obats', 'konsumsi_obats.pasien_id', '=', 'users.id')
                ->join('kondisis', 'kondisis.pasien_id', '=', 'users.id')
                ->where('clusters.faskes_id', Auth::user()->id)
                ->where('kondisis.periode', $request->periode)
                ->get();
            $periode = $request->periode;
            if ($biodata) {
                return view('data.art', compact('biodata', 'periode'));
            } else {
                toast('Tidak ada data pada bulan ini!', 'error');
                return redirect(route('art.index'));
            }
        } else {
            if (Auth::user()->role == 'kotagor') {
                $wilayah = "Kota Gorontalo";
            } elseif (Auth::user()->role == 'kabbonbol') {
                $wilayah = "Kab. Bonebolango";
            } elseif (Auth::user()->role == 'kabgor') {
                $wilayah = "Kab. Gorontalo";
            } elseif (Auth::user()->role == 'kabbol') {
                $wilayah = "Kab. Boalemo";
            } elseif (Auth::user()->role == 'kabpoh') {
                $wilayah = "Kab. Pohuwato";
            } elseif (Auth::user()->role == 'kabgorut') {
                $wilayah = "Kab. Gorontalo Utara";
            }
            $biodata = User::join('biodatas', 'biodatas.pasien_id', '=', 'users.id')
                ->join('clusters', 'clusters.pasien_id', '=', 'users.id')
                ->join('konsumsi_obats', 'konsumsi_obats.pasien_id', '=', 'users.id')
                ->join('kondisis', 'kondisis.pasien_id', '=', 'users.id')
                ->where('biodatas.domisili', '=', $wilayah)
                ->where('kondisis.periode', $request->periode)
                ->get();
            $periode = $request->periode;
            if ($biodata) {
                return view('data.art', compact('biodata', 'periode'));
            } else {
                toast('Tidak ada data pada bulan ini!', 'error');
                return redirect(route('art.index'));
            }
        }
    }

    public function pasien()
    {
        $data = User::where('role', 'faskes')->get();
        return view('pasien.pasien', compact('data'));
    }

    public function getDataPasien(Request $request)
    {
        $this->validate($request, [
            'id' => 'required'
        ]);
        $biodata = User::join('biodatas', 'biodatas.pasien_id', '=', 'users.id')
            ->join('clusters', 'clusters.pasien_id', '=', 'users.id')
            ->where('clusters.faskes_id', $request->id)
            ->where('users.role', 'pasien')
            ->get();

        $faskes = User::find($request->id);
        return view('data.pasien', compact('biodata', 'faskes'));
    }

    public function getDataPasienWilayah()
    {
        if (Auth::user()->role == 'kotagor') {
            $wilayah = "Kota Gorontalo";
        } elseif (Auth::user()->role == 'kabbonbol') {
            $wilayah = "Kab. Bonebolango";
        } elseif (Auth::user()->role == 'kabgor') {
            $wilayah = "Kab. Gorontalo";
        } elseif (Auth::user()->role == 'kabbol') {
            $wilayah = "Kab. Boalemo";
        } elseif (Auth::user()->role == 'kabpoh') {
            $wilayah = "Kab. Pohuwato";
        } elseif (Auth::user()->role == 'kabgorut') {
            $wilayah = "Kab. Gorontalo Utara";
        }
        $biodata = User::join('biodatas', 'biodatas.pasien_id', '=', 'users.id')
            ->join('clusters', 'clusters.pasien_id', '=', 'users.id')
            ->where('biodatas.domisili', '=', $wilayah)
            ->where('users.role', 'pasien')
            ->get();

        return view('data.pasien-wilayah', compact('biodata'));
    }
}
