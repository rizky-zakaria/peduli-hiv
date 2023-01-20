<?php

namespace App\Http\Controllers;

use App\Models\Biodata;
use App\Models\Cluster;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PasienController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = User::where('role', 'pasien')->get();
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
        $pasien->save();

        $biodata = Biodata::create([
            'pasien_id' => $pasien->id,
            'nik' => $request->nik,
            'tahun_lapor' => date('Y'),
            'bulan_lapor' => date('M'),
            'tgl_kunjungan' => date('d-m-Y'),
            'no_rekamedik' => $request->norek,
            'no_reg_nas' => $request->noreg,
            'no_telp' => $request->notelp,
            'tgl_lahir' => $request->tgl_lahir,
            'jk' => $request->jk,
            'pekerjaan' => $request->pekerjaan,
            'pendidikan' => $request->pendidikan
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
}
