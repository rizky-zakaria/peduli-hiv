<?php

namespace App\Http\Controllers;

use App\Models\Biodata;
use App\Models\Cluster;
use App\Models\Kondisi;
use App\Models\KonsumsiObat;
use App\Models\User;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\Console\Command\DumpCompletionCommand;

class PasienController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Cluster::join('users', 'users.id', '=', 'clusters.pasien_id')
            ->join('biodatas', 'biodatas.pasien_id', '=', 'users.id')
            ->where('clusters.faskes_id', Auth::user()->id)
            ->where('users.role', 'pasien')
            ->get();
        // dd($data);
        $cluster = Cluster::all();
        $faskes = User::where('role', 'faskes')->get();
        return view('pasien.index', compact('data', 'faskes', 'cluster'));
    }

    public function manajemen(Request $request)
    {
        $post = new Cluster;
        $post->pasien_id = $request->pasien;
        $post->faskes_id = $request->faskes;
        $post->save();

        if ($post) {
            return redirect(route('pasien.index'));
        } else {
            return redirect(route('pasien.index'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pasien.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function cd4create($id)
    {
        return view('pasien.cd4', compact('id'));
    }

    public function cd4store(Request $request)
    {
        $cek = Kondisi::where('pasien_id', $request->id)->where('periode', $request->periode)->first();
        if ($cek) {
            toast('Gagal menambahkan data cd4', 'error');
            return redirect()->back();
        } else {
            Kondisi::create([
                'pasien_id' => $request->id,
                'cd4' => $request->cd4,
                'periode' => $request->periode,
                'ims' => $request->ims
            ]);
        }

        return redirect(route('pasien.index'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:5',
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $pasien = new User();
        $pasien->name = $request->name;
        $pasien->email = $request->email;
        $pasien->password = Hash::make($request->password);
        $pasien->role = 'pasien';
        $pasien->alamat = $request->alamat;
        $pasien->jenis = '-';
        $pasien->save();

        $biodata = Biodata::create([
            'pasien_id' => $pasien->id,
            'nik' => $request->nik,
            'tahun_lapor' => date('Y'),
            'bulan_lapor' => date('M'),
            'tgl_kunjungan' => date('d-m-Y'),
            'no_reg_nas' => $request->noreg,
            'no_telp' => $request->notelp,
            'tgl_lahir' => $request->tgl_lahir,
            'jk' => $request->jk,
            'pekerjaan' => $request->pekerjaan,
            'pendidikan' => $request->pendidikan,
            'hamil' => $request->hamil,
            'fungsional' => $request->fungsional,
            'jenis' => $request->jenis
        ]);

        Cluster::create([
            'pasien_id' => $pasien->id,
            'faskes_id' => Auth::user()->id
        ]);

        return redirect()->route('pasien.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $pasien)
    {
        return view('pasien.edit', compact('pasien'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $pasien)
    {
        $this->validate($request, [
            'name' => 'required|min:5',
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $pasien->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
        ]);

        return redirect()->route('pasien.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $pasien)
    {
        $pasien->delete();
        return back();
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

    public function art(Request $request)
    {
        if (Auth::user()->role === 'dikes') {
            $biodata = User::join('biodatas', 'biodatas.pasien_id', '=', 'users.id')
                ->join('clusters', 'clusters.pasien_id', '=', 'users.id')
                ->join('konsumsi_obats', 'konsumsi_obats.pasien_id', '=', 'users.id')
                ->where('clusters.faskes_id', Auth::user()->id)
                ->where('konsumsi_obats.periode', $request->periode)
                ->get();
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
        } else {
            $biodata = User::join('biodatas', 'biodatas.pasien_id', '=', 'users.id')
                ->join('clusters', 'clusters.pasien_id', '=', 'users.id')
                ->join('konsumsi_obats', 'konsumsi_obats.pasien_id', '=', 'users.id')
                ->where('clusters.faskes_id', Auth::user()->id)
                ->where('konsumsi_obats.periode', $request->periode)
                ->get();
            dd($biodata);
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
    }
}
