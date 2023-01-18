<?php

namespace App\Http\Controllers;

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
            $obat = Obat::find($request->obat[$i]);
            if ($obat->jumlah > $request->banyak[$i]) {
                $obat->jumlah = $obat->jumlah - $request->banyak[$i];
                $obat->update();
            } else {
                toast('Persediaan obat tidak cukup', 'error');
                return redirect(url('dikes/obat'));
            }
        }

        HistoriObat::create([
            'history' => Auth::user()->name . " memberikan obat kepada pasien " . $pasien->name . " pada tanggal " . date('d M Y')
        ]);
        return redirect(url('dikes/obat'));
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
            'stok' => 'required'
        ]);

        $obat = new Obat();
        $obat->nama = $request->nama;
        $obat->stok = $request->stok;
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
            'jenis' => 'required',
            'stok' => 'required'
        ]);

        $obat->update([
            'nama' => $request->nama,
            'stok' => $request->stok,
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

    public function cari($nama)
    {
        $data = User::where('name', $nama)->first();

        if (isset($data->name)) {
            return response()->json($data);
        } else {
            return response()->json(null);
        }
    }
}
