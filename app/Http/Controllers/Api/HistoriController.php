<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Histori;
use App\Models\NotifDistribusi;
use Illuminate\Http\Request;

class HistoriController extends Controller
{
    public function getHistoriById(Request $request)
    {
        $data = Histori::where('user_id', $request->id)->get();
        if ($data) {
            return response()->json([
                'success' => true,
                'message'    => 'Successfully',
                'data'    => $data,
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message'    => 'Not Found',
            ], 404);
        }
    }

    public function getNotif(Request $request)
    {
        $data = NotifDistribusi::where('user_id', $request->id)->get();
        if ($data) {
            return response()->json([
                'success' => true,
                'message'    => 'Successfully',
                'data'    => $data,
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message'    => 'Not Found',
            ], 404);
        }
    }
}
