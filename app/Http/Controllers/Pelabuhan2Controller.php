<?php

namespace App\Http\Controllers;

use App\Models\JadwalKapal;
use App\Models\Pelabuhan;
use App\Models\Rute;
use Illuminate\Http\Request;

class Pelabuhan2Controller extends Controller
{
    public function select(Request $request)
    {
        $pelabuhan1 = [];

        if ($request->has('q')) {
            $search = $request->q;
            $rute = Rute::all();

            $pelabuhan1 = JadwalKapal::select("kode_pelabuhan", "nama_pelabuhan")
                ->Where('nama_pelabuhan', 'LIKE', "%$search%")
                ->get();
        } else {
            $pelabuhan1 = Pelabuhan::limit(10)->get();
        }
        return response()->json($pelabuhan1);
    }
}
