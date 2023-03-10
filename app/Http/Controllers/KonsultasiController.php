<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use App\Models\Cluster;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KonsultasiController extends Controller
{
    public function index()
    {
        // $data = User::where('role', 'pasien')->get();
        $data = Cluster::where('faskes_id', Auth::user()->id)->get();
        return view('konsultasi.index', compact('data'));
    }

    public function getClusterById($id)
    {
        $data = Cluster::where('pasien_id', $id)
            ->join('users', 'users.id', '=', 'clusters.pasien_id')
            ->first();
        return response()->json($data);
    }

    public function postChat(Request $request)
    {
        $chat = new Chat;
        $chat->cluster_id = $request->id;
        $chat->pengirim = Auth::user()->role;
        $chat->pesan = $request->pesan;
        $chat->waktu = date('H:i:s');
        $chat->tanggal = date('d-m-Y');
        $chat->tipe = "text";
        $chat->save();

        if ($chat) {
            toast('Berhasil mengirim pesan', 'success');
            return redirect()->back();
        } else {
            toast('Gagal mengirim pesan', 'error');
            return redirect()->back();
        }
    }

    public function getChat($id)
    {
        $data = Chat::where('cluster_id', $id)->get();
        return response()->json($data);
    }
}
