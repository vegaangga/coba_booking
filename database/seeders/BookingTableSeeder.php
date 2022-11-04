<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('booking')->insert([
            [
                'id_user' => "1",
                'id_jadwal' => '1',
                'id_barang' => '1',
                'tanggal' => '2022-10-1',
                'status' => 'pending'
            ],
        ]);
    }
}
