<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Booking;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookingController extends Controller
{
    public function index(Request $request)
    {
        //$booking = Booking::with(['user', 'jadwalkapal', 'barang', 'container'])->first();
        //$booking = Booking::all();
        $booking = DB::table('booking')->get();
        $jadwal = DB::table('jadwal_kapal')->get();
        // return view('booking.index', [
        //     'booking' => $booking->paginate(5),
        // ]);
        //dd($booking);
        return view('booking.index', [
                'booking' => $booking,
                
        ]);
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