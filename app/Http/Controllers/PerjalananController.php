<?php

namespace App\Http\Controllers;

use App\Models\LaporanPerjalanan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PerjalananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = LaporanPerjalanan::join('users', 'users.id', '=', 'laporan_perjalanans.pasien_id')->get();
        // dd($data);
        return view('perjalanan.index', compact('data'));
    }

    public function cetakById($id)
    {
        $data = LaporanPerjalanan::join('users', 'users.id', '=', 'laporan_perjalanans.pasien_id')
            ->where('users.id', $id)
            ->get();

        $faskes = User::find(Auth::user()->id);
        $user = User::join('biodatas', 'biodatas.pasien_id', '=', 'users.id')->where('users.id', $id)->first();
        return view('perjalanan.cetakById', compact('data', 'user', 'faskes'));
    }

    public function cetakAll()
    {

        $faskes = User::find(Auth::user()->id);
        $data = LaporanPerjalanan::join('users', 'users.id', '=', 'laporan_perjalanans.pasien_id')->get();
        return view('perjalanan.cetakAll', compact('data', 'faskes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
