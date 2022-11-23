<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\City;
use App\Models\Booking;
use App\Models\JenisBarang;
use App\Models\JenisContainer;
use App\Models\Pelabuhan;
use App\Models\User;
use Illuminate\Support\Carbon;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Helpers\Helper;

class BookingController extends Controller
{
    public function index(Request $request)
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
        $products = Booking::all();
        return view('booking.index',compact('products'));
    }

    public function create()
    {
        $pelabuhan1 = Pelabuhan::all();
        return view('booking.create', compact('pelabuhan1'));
    }

    public function store(Request $request)
    {
        // try {
        //     Booking::create([
        //         "name" => $request->name,
        //         "province_id" => $request->province,
        //         "regency_id" => $request->regency,
        //         "district_id" => $request->district,
        //         "village_id" => $request->village,
        //         "address" => $request->address,
        //     ]);
        //     return redirect()->route('booking.index');
        // } catch (\Throwable $th) {
        //     dd($th->getMessage());
        // }
        try {
           // dd($request);

            // Barang::create([
            //     "jenis_barang" => $request->jenis_barang,
            //     "nama_barang" => $request->nama_barang,
            //     "berat_barang" => $request->berat_barang,
            // ]);
            //$barang = Barang::get('id')->first();
            // Booking::create([
            //     "id_user" => '1',
            //     "id_jadwal" => $request->jadwal,
            //     "id_container"=> $request->jenis_container,
            //     "id_barang" => $barang,
            //     "status" => "belum",
            // ]);
            // dd($request);
            $this->validate($request, [
                'jenis_barang' => 'required',
                'nama_barang' => 'required|string',
                'berat_barang' => 'required|integer',
            ]);
            $barang = DB::table('barang')->orderByDesc('id')->pluck('id')->first();
            $id=(int)$barang+1;
            //no_resi
            // $no_resi = DB::table('barang')->orderByDesc('no_resi')->pluck('no_resi')->first();
            // $huruf = 'BKG';
            // $nomor = (int) substr($no_resi, 3, 3);
            // $nomor++;
            // $resi = $huruf . sprintf("%03s", $nomor);
            // $last_id = Booking::orderBy('BK', 'desc')->first()->BK;
            // $last_id = $last_id++;

            //$no_resi = IdGenerator::generate(['table' => 'booking', 'length' => 10, 'prefix' =>'CUST-']);
             /** Generate id */
            Barang::create([
                'jenis_barang' => $request->input('jenis_barang'),
                'nama_barang' =>  $request->input('nama_barang'),
                'berat_barang' => $request->input('berat_barang'),
            ]);
            $student_id = Helper::IDGenerator(new Booking, 'no_resi', 2, 'STD');

            $num = Booking::orderBy('no_resi','desc')->count();
            $dataCode = Booking::orderBy('no_resi','desc')->first();
            if ($num == 0) {
                $code = 'BK001';
            }
            else{
                $c = $dataCode->no_resi;
                $cod = (int) substr($c, 3)+1;
                $code = "BK00".$cod;
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
            $q->no_resi = $code;
            $q->id_user = '1';
            $q->id_jadwal = $request->input('id_jadwal');
            $q->jenis_container = $request->input('jenis_container');
            $q->id_container = '1';
            $q->id_barang = $id;
            $q->nama_penerima = $request->input('nama_penerima');
            $q->telp_penerima = $request->input('telp_penerima');
            $q->alamat_penerima = $request->input('alamat_penerima');;
            $q->status = '1';
            $q->save();

            return back()->with('Yay', 'Booking uccessfully');
        } catch (\Throwable $th) {
            dd($th->getMessage());
        }
    }

    public function edit(Booking $Booking)
    {
        return view('booking.edit', [
            'Booking' => $Booking,
            'provinceSelected' => $Booking->province,
            'regencySelected' => $Booking->regency,
            'districtSelected' => $Booking->district,
            'villageSelected' => $Booking->village,
        ]);
    }

    public function update(Request $request, Booking $Booking)
    {
        try {
            $Booking->update([
                "name" => $request->name,
                "province_id" => $request->province,
                "regency_id" => $request->regency,
                "district_id" => $request->district,
                "village_id" => $request->village,
                "address" => $request->address,
            ]);
            return redirect()->route('booking.index');
        } catch (\Throwable $th) {
            dd($th->getMessage());
        }
    }

    public function createStepOne(Request $request)
    {
        $jc = JenisContainer::all();
        $jb = JenisBarang::all();
        $booking = $request->session()->get('booking');
        $barang = $request->session()->get('barang');

        //return view('booking.create-step-two',compact('barang','jc','jb','booking'));
        //$booking = $request->session()->get('booking');

        return view('booking.booking',compact('jc','jb'));
    }


    public function postCreateStepOne(Request $request)
    {
        $validatedData = $request->validate([
            'id_jadwal' => 'required',
            'fname' => 'required',
            'lname' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'dd' => 'required',
            'nn' => 'required',
            'yy' => 'required',
            'uname' => 'required',
            'pword' => 'required',
            // 'jenis_container' => 'required',
            // 'jenis_barang' => 'required',
            // 'nama_barang' => 'required',
            // 'berat_barang' => 'required',
        ]);

        // if(empty($request->session()->get('booking'))){
        //     $booking = new Booking();
        //     $booking->fill($validatedData);
        //     $request->session()->put('booking', $booking);
        // }else{
        //     $booking = $request->session()->get('booking');
        //     $booking->fill($validatedData);
        //     $request->session()->put('booking', $booking);
        // }

        // return redirect()->route('booking.create.step.two');
        dd($validatedData);
       //return redirect()->route('booking.step.one');
    }

    /**
     * Show the step One Form for creating a new product.
     *
     * @return \Illuminate\Http\Response
     */
    public function createStepTwo(Request $request)
    {
        $jc = JenisContainer::all();
        $jb = JenisBarang::all();
        $booking = $request->session()->get('booking');
        $barang = $request->session()->get('barang');

        return view('booking.create-step-two',compact('barang','jc','jb','booking'));
    }

    /**
     * Show the step One Form for creating a new product.
     *
     * @return \Illuminate\Http\Response
     */
    public function postCreateStepTwo(Request $request)
    {
        $validatedData = $request->validate([
            'jenis_container' => 'required',
            'jenis_barang' => 'required',
            'nama_barang' => 'required',
            'berat_barang' => 'required',
        ]);

        if(empty($request->session()->get('barang'))){
            $barang = new Barang();
            $booking = new Booking();
            $barang->fill($validatedData);
            $request->session()->put('barang', $barang);
        }else{
            $barang = $request->session()->get('barang');
            $barang->fill($validatedData);
            $request->session()->put('barang', $barang);
        }

        $barang = $request->session()->get('barang');
        $booking = $request->session()->get('booking');
        $barang->fill($validatedData);
        $request->session()->put('barang', $barang);
       // $request->session()->put('booking', $booking);

        return redirect()->route('booking.create.step.three');
        //dd($request);
    }

    /**
     * Show the step One Form for creating a new product.
     *
     * @return \Illuminate\Http\Response
     */
    public function createStepThree(Request $request)
    {
        $booking = $request->session()->get('booking');
        $barang = $request->session()->get('barang');

        return view('booking.create-step-three',compact('booking','barang'));
    }

    /**
     * Show the step One Form for creating a new product.
     *
     * @return \Illuminate\Http\Response
     */
    public function postCreateStepThree(Request $request)
    {
        $product = $request->session()->get('product');
        $product->save();

        $request->session()->forget('product');

        return redirect()->route('booking.index');
    }

    public function StepOne(Request $request)
    {
        $booking = $request->session()->get('booking');

        return view('booking.step-one',compact('booking'));
    }


    public function postStepOne(Request $request)
    {
        $validatedData = $request->validate([
            'id_jadwal' => 'required',
        ]);

        if(empty($request->session()->get('booking'))){
            $booking = new Booking();
            $booking->fill($validatedData);
            $request->session()->put('booking', $booking);
        }else{
            $booking = $request->session()->get('booking');
            $booking->fill($validatedData);
            $request->session()->put('booking', $booking);
        }

        return redirect()->route('booking.create.step.two');
    }


}