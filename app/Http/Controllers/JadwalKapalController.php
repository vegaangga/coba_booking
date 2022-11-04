<?php

namespace App\Http\Controllers;

use App\Models\JadwalKapal;
use App\Models\Regency;
use Illuminate\Http\Request;

class JadwalKapalController extends Controller
{
    public function select(Request $request)
    {
        $jadwal = [];
        $asalID = $request->asalID;
        $tujuanID = $request->tujuanID;
        if ($request->has('q')) {
            $search = $request->q;
            $jadwal = JadwalKapal::select("id", "id_kapal")
                // ->join('kapal', 'kapal.kode_kapal', '=', 'jadwal_kapal.id_kapal')
                ->where('asal_pelabuhan_id', $asalID)
                ->orWhere('asal_pelabuhan_id', 'LIKE', "%$search%")
                ->get();
        } else {
            $jadwal = JadwalKapal::where('asal_pelabuhan_id', $asalID)
            //->orwhere('tujuan_pelabuhan_id', $tujuanID)
            ->join('kapal', 'kapal.kode_kapal', '=', 'jadwal_kapal.id_kapal')
            ->limit(10)
            ->get();
        }
        return response()->json($jadwal);
    }
}

