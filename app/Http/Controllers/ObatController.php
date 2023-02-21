<?php

namespace App\Http\Controllers;

use App\Models\Biodata;
use App\Models\DistribusiObat;
use App\Models\Dosis;
use App\Models\HistoriObat;
use App\Models\Obat;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Console\View\Components\Alert;

class ObatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Obat::all();
        $obat = Obat::all();
        $jumlah = count($obat);
        return view('obat.index', compact('data', 'obat', 'jumlah'));
    }

    public function ambilObat(Request $request)
    {
        $pasien = User::find($request->userId);
        for ($i = 0; $i < count($request->obat); $i++) {
            DistribusiObat::create([
                'pasien_id' => $request->userId,
                'faskes_id' => Auth::user()->id,
                'obat_id' => $request->obat[$i],
                'dosis' => $request->dosis,
                'jumlah' => $request->banyak[$i],
                'waktu' => $request->waktu
            ]);
        }

        HistoriObat::create([
            'history' => Auth::user()->name . " memberikan obat kepada pasien " . $pasien->name . " pada tanggal " . date('d M Y')
        ]);
        toast('Berhasil Melakukan Transaksi', 'success');
        return redirect(url('faskes/obat'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('obat.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required|min:4',
            'kode' => 'required',
            'jenis' => 'required',
        ]);

        $obat = new Obat();
        $obat->nama = $request->nama;
        $obat->jenis = $request->jenis;
        $obat->kode = $request->kode;

        $obat->save();

        return redirect()->route('obat.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Obat $obat)
    {
        return view('obat.edit', compact('obat'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Obat $obat)
    {
        $this->validate($request, [
            'nama' => 'required|min:4',
            'kode' => 'required',
            'jenis' => 'required'
        ]);

        $obat->update([
            'nama' => $request->nama,
            'jenis' => $request->jenis,
            'kode' => $request->kode,
        ]);

        return redirect()->route('obat.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Obat $obat)
    {
        $obat->delete();
        return back();
    }

    public function cari($nik)
    {
        $data = Biodata::join('users', 'users.id', '=', 'biodatas.pasien_id')
            ->where('biodatas.no_reg_nas', $nik)
            ->first();
        if (isset($data->nik)) {
            return response()->json($data);
        } else {
            return response()->json(null);
        }
    }
}
