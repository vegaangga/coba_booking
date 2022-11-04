<?php

namespace App\Http\Controllers;

use App\Models\JadwalKapal;
use App\Models\Pelabuhan;
use App\Models\Rute;
use Illuminate\Http\Request;

class PelabuhanController extends Controller
{
    public function select(Request $request)
    {
        $pelabuhan1 = [];

        if ($request->has('q')) {
            $search = $request->q;
            $pelabuhan1 = Pelabuhan::select("kode_pelabuhan", "nama_pelabuhan")
                ->Where('nama_pelabuhan', 'LIKE', "%$search%")
                ->get();
            // $rute = Rute::select("asal_pelabuhan_id")
            //     ->where('asal_pelabuhan','LIKE',$pelabuhan1);
            // $pelabuhan1=JadwalKapal::join('jadwal_pelabuhan', 'jadwal_pelabuhan.asal_pelabuhan_id', '=', 'pelabuhan.kode_pelabuhan')
            //   		->join('kapal', 'kapal.kode_kapal', '=', 'jadwal_pelabuhan.id_kapal')
            //   		->get(['jadwal.kode_pelabuhan', 'pelabuhan.nama_pelabuhan',]);
        } else {
            $pelabuhan1 = Pelabuhan::limit(10)->get();
        }
        return response()->json($pelabuhan1);
    }

    public function select2 (Request $request)
    {
        $pelabuhan2 = [];

        if ($request->has('q')) {
            $search = $request->q;
            //$rute = Rute::all();

            $pelabuhan2 = JadwalKapal::select("kode_pelabuhan", "nama_pelabuhan")
                ->Where('nama_pelabuhan', 'LIKE', "%$search%")
                ->get();
        } else {
            $pelabuhan2 = JadwalKapal::limit(10)->get();
        }
        return response()->json($pelabuhan2);
    }
}
