<?php

namespace App\Http\Controllers;

use App\Models\JadwalKapal;
use App\Models\Kapal;
use App\Models\Pelabuhan;
use App\Models\Rute;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
            // $pelabuhan1=Rute::select('id','rute.asal_pelabuhan_id','pelabuhan.nama_pelabuhan')
            //         ->where('pelabuhan.nama_pelabuhan','LIKE',"%$search%")
            //         ->join('pelabuhan', 'pelabuhan.kode_pelabuhan', '=', 'rute.asal_pelabuhan_id')
            //         ->groupBy('asal_pelabuhan_id')
            //         ->havingRaw('count(*) > 1')
            //   		// ->get(['rute.asal_pelabuhan_id', 'pelabuhan.nama_pelabuhan',]);
            //         ->get();
            // $pelabuhan1 = DB::table('rute')
            //         ->select(DB::raw('id','rute.asal_pelabuhan_id','pelabuhan.nama_pelabuhan'))
            //         ->where('pelabuhan.nama_pelabuhan','LIKE',"%$search%")
            //         ->join('pelabuhan', 'pelabuhan.kode_pelabuhan', '=', 'rute.asal_pelabuhan_id')
            //         //->groupBy('rute.asal_pelabuhan_id')
            //         ->get();

        } else {
            $pelabuhan1 = Pelabuhan::limit(10)->get();
            // $pelabuhan1=Rute::select('id','id_trip', 'rute.asal_pelabuhan_id', 'pelabuhan.nama_pelabuhan')
            //   		->join('pelabuhan', 'pelabuhan.kode_pelabuhan', '=', 'rute.asal_pelabuhan_id')
            //   		//->get(['rute.id_trip, rute.asal_pelabuhan_id', 'pelabuhan.nama_pelabuhan',]);
            //         ->get();
            //         // $pelabuhan1 = DB::table('rute')
            //         // ->select(DB::raw('rute.asal_pelabuhan_id','pelabuhan.nama_pelabuhan'))
            //         // ->join('pelabuhan', 'pelabuhan.kode_pelabuhan', '=', 'rute.asal_pelabuhan_id')
            //         // ->groupBy('rute.asal_pelabuhan_id')
            //         // ->get();
        }
        return response()->json($pelabuhan1);
    }

    public function select2 (Request $request)
    {
        $pelabuhan2 = [];
        $asalID = $request->asalID;
        $tujuanID = $request->tujuanID;

        if ($request->has('q')) {
            $search = $request->q;
            $pelabuhan2=Rute::select('id','rute.asal_pelabuhan_id','pelabuhan.nama_pelabuhan')
                    ->where('pelabuhan.nama_pelabuhan','LIKE',"%$search%")
                    ->join('pelabuhan', 'pelabuhan.kode_pelabuhan', '=', 'rute.asal_pelabuhan_id')
              		// ->get(['rute.asal_pelabuhan_id', 'pelabuhan.nama_pelabuhan',]);
                    ->get();
            // $pelabuhan2 = Rute::select("id", "id_trip","rute.tujuan_pelabuhan_id","pelabuhan.nama_pelabuhan")
            //         ->where('id_trip', $idTrip)
            //         //->orWhere('pelabuhan.nama_pelabuhan', 'LIKE', "%$search%")
            //         ->orWhere('id')
            //         ->join('pelabuhan', 'pelabuhan.kode_pelabuhan', '=', 'rute.tujuan_pelabuhan_id')
            //         ->get();

        } else {
            $pelabuhan2 = Rute::where('asal_pelabuhan_id', $asalID)
                            ->orWhere('asal_pelabuhan_id',$tujuanID)
                            ->limit(10)
                            ->join('pelabuhan', 'pelabuhan.kode_pelabuhan', '=', 'rute.tujuan_pelabuhan_id')
                            ->get();
        }
        return response()->json($pelabuhan2);
    }

    public function select3 (Request $request)
    {
        $pelabuhan2 = [];
        $asalID = $request->asalID;
        $tujuanID = $request->tujuanID;

        if ($request->has('q')) {
            $search = $request->q;
            $pelabuhan2=Rute::select('id','rute.asal_pelabuhan_id','pelabuhan.nama_pelabuhan')
                    ->where('pelabuhan.nama_pelabuhan','LIKE',"%$search%")
                    ->join('pelabuhan', 'pelabuhan.kode_pelabuhan', '=', 'rute.asal_pelabuhan_id')
              		// ->get(['rute.asal_pelabuhan_id', 'pelabuhan.nama_pelabuhan',]);
                    ->get();
            // $pelabuhan2 = Rute::select("id", "id_trip","rute.tujuan_pelabuhan_id","pelabuhan.nama_pelabuhan")
            //         ->where('id_trip', $idTrip)
            //         //->orWhere('pelabuhan.nama_pelabuhan', 'LIKE', "%$search%")
            //         ->orWhere('id')
            //         ->join('pelabuhan', 'pelabuhan.kode_pelabuhan', '=', 'rute.tujuan_pelabuhan_id')
            //         ->get();

        } else {
            // $pelabuhan2 = DB::table('rute')
            // ->join('trip', 'rute.id', '=', 'trip.id_trip')
            // ->join('kapal', 'trip.id_kapal', '=', 'kapal.id_kapal')
            // // ->where('rute.asal_pelabuhan_id', $asalID)
            // // ->Where('rute.tujuan_pelabuhan_id',$tujuanID)
            // ->select('rute.id','rute.id_trip', 'rute.ETA','rute.ETD')
            // ->get();
            $pelabuhan2 = Rute::select('rute.id','rute.id_trip','trip.nama_trip', 'rute.ETA','rute.ETD','kapal.nama_kapal')
                            ->join('trip', 'trip.id', '=', 'rute.id_trip')
                            ->join('kapal', 'kapal.id', '=', 'trip.id_kapal')
                            ->where('rute.asal_pelabuhan_id', $asalID)
                            ->Where('rute.tujuan_pelabuhan_id',$tujuanID)

            //                 //->get(['rute.id_trip','kapal.nama_kapal', 'rute.ETA','rute.ETD',])
            //                 ->limit(10)
                            ->get();
                            // $pelabuhan2 = Rute::where('asal_pelabuhan_id', $asalID)
                            // ->Where('tujuan_pelabuhan_id',$tujuanID)
                            // // ->innerjoin('trip', 'trip.id', '=', 'rute.id_trip')
                            // // ->innerjoin('kapal', 'kapal.id', '=', 'trip.id_kapal')
                            // ->limit(10)
                            // ->get();
        }
        //dd($pelabuhan2);
        return response()->json($pelabuhan2);
    }

    public function search(Request $request)
    {
        $trip = DB::table('rute');
        if( $request->select_pelabuhan1 && $request->select_pelabuhan2 ){
            $trip = $trip->where('asal_pelabuhan_id', $request->select_pelabuhan1)
                         ->where('tujuan_pelabuhan_id',$request->select_pelabuhan2);
        }
        $trip = $trip->paginate(10);
        return view('booking.index', compact('trip'));
    }

    public function create()
    {
        $countries = Pelabuhan::all();

        return view('houses.create', compact('countries'));
    }


    public function pelabuhan1()
    {
        $pelabuhan1 = Pelabuhan::all();
        return view('booking.create', compact('pelabuhan1'));
    }
    public function pelabuhan2()
    {
        $pelabuhan2 = Rute::whereHas('pelabuhan', function ($query) {
            $query->whereId(request()->input('asal_pelabuhan_id', 0));
        })->pluck('nama_pelabuhan', 'asal_pelabuhan_id');

        return response()->json($pelabuhan2);
    }
    public function jadwal()
    {
        $jadwal = Rute::whereHas('pelabuhan', function ($query) {
            $query->whereId(request()->input('tujuan_pelabuhan_id', 0));
        })->pluck('nama_pelabuhan', 'id');

        return response()->json($jadwal);
    }
}
