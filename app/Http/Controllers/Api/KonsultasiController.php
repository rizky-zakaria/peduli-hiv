<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Chat;
use App\Models\Cluster;
use Illuminate\Http\Request;

class KonsultasiController extends Controller
{
    public function getChat(Request $request)
    {
        $data = Cluster::join('chats', 'chats.cluster_id', '=', 'clusters.id')
            ->where('clusters.pasien_id', '=', $request->id)
            ->get();
        return response()->json([
            'success' => TRUE,
            'data' => $data
        ]);
    }

    public function getFaskesName($id)
    {
        $data = Cluster::join('users', 'users.id', '=', 'clusters.faskes_id')
            ->where('clusters.pasien_id', '=', $id)
            ->first(['users.name']);
        return response()->json($data);
    }

    public function postChatText(Request $request)
    {
        $data = Chat::create([
            'cluster_id' => $request->id,
            'pengirim' => 'pasien',
            'pesan' => $request->pesan,
            'waktu' => date('H:i:s'),
            'tanggal' => date('d-m-Y'),
            'tipe' => 'text'
        ]);
        if ($data) {
            return response()->json([
                'success' => TRUE,
                'messages' => "Berhasil mengirim pesan"
            ]);
        } else {
            return response()->json([
                'success' => FALSE,
                'messages' => "Gagal mengirim pesan"
            ]);
        }
    }
}
