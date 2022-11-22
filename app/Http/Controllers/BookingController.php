<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\City;
use App\Models\Booking;
use App\Models\JenisBarang;
use App\Models\JenisContainer;
use App\Models\Pelabuhan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
            dd($request);

            Barang::create([
                "jenis_barang" => $request->jenis_barang,
                "nama_barang" => $request->nama_barang,
                "berat_barang" => $request->berat_barang,
            ]);
            $barang = Barang::get()->first();
            Booking::create([
                "id_user" => '1',
                "id_jadwal" => $request->jadwal,
                "id_container"=> $request->jenis_container,
                "id_barang" => $barang,
                "status" => "belum",
            ]);
            // dd($request);
            return redirect()->route('stores.index');
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