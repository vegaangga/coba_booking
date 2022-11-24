<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Booking;
use App\Models\JadwalKapal;
use App\Models\JenisBarang;
use App\Models\JenisContainer;
use App\Models\Rute;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         //$booking = Booking::with(['user', 'jadwalkapal', 'barang', 'container'])->first();
        //$booking = Booking::all();
        // $booking = DB::table('rute')->get();
        // $jadwal = DB::table('jadwal_kapal')->get();
        // return view('booking.index', [
        //     'booking' => $booking->paginate(5),
        // ]);
        //dd($booking);
        // return view('booking.index', [
        //         'booking' => $booking,

        // ]);
        $bookings = Booking::all();
        return view('booking.index',compact('bookings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jc = JenisContainer::all();
        $jb = JenisBarang::all();

        return view('booking.create',compact('jc','jb'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            // dd($request);
            $this->validate($request, [
                'jenis_barang' => 'required',
                'nama_barang' => 'required|string',
                'berat_barang' => 'required|integer',
            ]);
            $barang = DB::table('barang')->orderByDesc('id')->pluck('id')->first();
            $id=(int)$barang+1;

            $huruf = 'BKG';
            Barang::create([
                'jenis_barang' => $request->input('jenis_barang'),
                'nama_barang' =>  $request->input('nama_barang'),
                'berat_barang' => $request->input('berat_barang'),
            ]);

            $num = Booking::orderBy('no_resi','desc')->count();
            $dataCode = Booking::orderBy('no_resi','desc')->first();
            if ($num == 0) {
                $resi = 'BKG001';
            }
            else{
                $c = $dataCode->no_resi;
                $cod = (int) substr($c, 3);
                $cod++;
                $resi = $huruf . sprintf("%03s", $cod);
                // $code = "BK00".$cod;
            }
            //echo $student_id;
            // Booking::create([
            //     'no_resi' => $student_id,
            //     'id_user' => '1',
            //     'id_jadwal' => $request->input('id_jadwal'),
            //     'jenis_container'=> $request->input('jenis_container'),
            //     'id_container'=> '0',
            //     'id_barang' => $id,
            //     'nama_penerima' => $request->input('nama_penerima'),
            //     'telp_penerima' => $request->input('telp_penerima'),
            //     'alamat_penerima' => $request->input('alamat_penerima'),
            //     'status' => 'belum',
            // ]);

            $q = new Booking();
            $q->no_resi = $resi;
            $q->id_user = '1';
            $q->id_jadwal = $request->input('id_jadwal');
            // $q->jenis_container = $request->input('jenis_container');
            $q->id_container = '1';
            $q->id_barang = $id;
            $q->nama_penerima = $request->input('nama_penerima');
            $q->telp_penerima = $request->input('telp_penerima');
            $q->alamat_penerima = $request->input('alamat_penerima');;
            $q->status = 'belum';
            $q->save();

            return back()->with('Yay', 'Booking uccessfully');
        } catch (\Throwable $th) {
            dd($th->getMessage());
        }
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
        //form booking
        $booking = Booking::find($id);
        $fjadwal = Rute::select('rute.id','rute.id_trip','trip.nama_trip', 'rute.ETA','rute.ETD','kapal.nama_kapal')
                            ->join('trip', 'trip.id', '=', 'rute.id_trip')
                            ->join('kapal', 'kapal.id', '=', 'trip.id_kapal')
                            ->Where('rute.id',$id)
                            ->get();
        //Menampilkan barang yg sesuai di tabel booking
        $idbarang = DB::table('booking')
                    ->where('id',$id)
                    ->pluck('id_barang');

        $barang = Barang::find($idbarang);
        $b = json_decode($barang);

        //modal tabel jadwal
        $tjadwal = Rute::join('trip', 'trip.id', '=', 'rute.id_trip')// joining the contacts table , where user_id and contact_user_id are same
            ->join('kapal', 'kapal.id', '=', 'trip.id_kapal')
            ->join('pelabuhan','pelabuhan.kode_pelabuhan','=','rute.asal_pelabuhan_id')
            ->join('pelabuhan as p','p.kode_pelabuhan','=','rute.tujuan_pelabuhan_id')
            ->join('container','container.kode_kapal','=','kapal.id')
            ->select('rute.*','rute.id_trip','kapal.nama_kapal', 'rute.ETA','rute.ETD','kapal.nama_kapal','container.kode_container','container.kapasitas_berat')
            ->get();

        return view('booking.edit', compact('booking','tjadwal','fjadwal','b'));
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
