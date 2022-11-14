<?php

namespace App\Http\Controllers;

use App\Models\JadwalKapal;
use App\Models\Regency;
use App\Models\Rute;
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
            $jadwal = Rute::select("id", "asal_pelabuhan_id")
                // ->join('kapal', 'kapal.kode_kapal', '=', 'jadwal_kapal.id_kapal')
                ->where('asal_pelabuhan_id', $asalID)
                ->orWhere('asal_pelabuhan_id', 'LIKE', "%$search%")
                ->get();
        } else {
            $jadwal = Rute::where('asal_pelabuhan_id', $asalID)
            //->orwhere('tujuan_pelabuhan_id', $tujuanID)
            ->join('pelabuhan', 'pelabuhan.kode_pelabuhan', '=', 'rute.tujuan_pelabuhan_id')
            ->limit(10)
            ->get();
        }
        return response()->json($jadwal);
    }
}

