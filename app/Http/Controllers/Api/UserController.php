<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Biodata;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function getBiodata(Request $request)
    {

        $post = Biodata::where('pasien_id', $request->id)->first();

        if ($post) {
            return response()->json([
                'success' => true,
                'message'    => 'Successfully',
                'data' => $post
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message'    => 'Not Found',
            ], 404);
        }
    }
}
