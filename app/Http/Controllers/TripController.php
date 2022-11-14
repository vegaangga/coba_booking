<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Booking;
use App\Models\User;
use App\Models\Trip;
use App\Models\Rute;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TripController extends Controller
{
    public function index(Request $request)
    {
        //$trip = Trip::with(['pelabuhan'])->first();
        $trip = trip::all();
        //$booking = DB::table('booking')->get();
        //$id=$request->id;
        //$rute = Rute::where('id_trip',$id);
        $rute = Rute::all();
        return view('booking.index', [
            'trip' => $trip,
            'rute' => $rute
        ]);
        //dd($booking);
        // return view('booking.index', [
        //         'trip' => $trip,
        // ]);
    }

    public function create()
    {
        return view('booking.create');
    }

    public function Booking(Request $request)
    {
        try {
            Booking::create([
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
}