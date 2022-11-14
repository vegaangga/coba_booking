<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TripTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('trip')->insert([
            [
                'nama_trip' => "Trip A ke C",
                'asal_pelabuhan_id' => 'A',
                'final_pelabuhan_id' => 'C',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'nama_trip' => "Trip D ke F",
                'asal_pelabuhan_id' => 'D',
                'final_pelabuhan_id' => 'F',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'nama_trip' => "Trip G ke I",
                'asal_pelabuhan_id' => 'G',
                'final_pelabuhan_id' => 'I',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'nama_trip' => "Trip A ke F",
                'asal_pelabuhan_id' => 'A',
                'final_pelabuhan_id' => 'F',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
        ]);
    }
}
