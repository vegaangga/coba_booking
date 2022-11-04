<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JadwalKapalTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('jadwal_kapal')->insert([
            // [
            //     'id_kapal' => "1-2930-DV",
            //     'id_rute' => '1',
            //     'asal_pelabuhan_id' => 'IDTJP',
            //     'tujuan_pelabuhan_id' => 'IDTPP',
            //     'ETA' => Carbon::parse('2022-10-15'),
            //     'ETD' => date('Y-m-d H:i:s'),
            //     'created_at' => date('Y-m-d H:i:s'),
            //     'updated_at' => date('Y-m-d H:i:s'),
            // ],
            // [
            //     'id_kapal' => "1-2949-DV",
            //     'id_rute' => '1',
            //     'asal_pelabuhan_id' => 'IDTPP',
            //     'tujuan_pelabuhan_id' => 'IDTJP',
            //     'ETA' => Carbon::parse('2022-10-15'),
            //     'ETD' => date('Y-m-d H:i:s'),
            //     'created_at' => date('Y-m-d H:i:s'),
            //     'updated_at' => date('Y-m-d H:i:s'),
            // ],
            [
                'id_kapal' => "1-2949-DV",
                'id_rute' => '2',
                'asal_pelabuhan_id' => 'IDTJP',
                'tujuan_pelabuhan_id' => 'IDTPP',
                'ETA' => Carbon::parse('2022-10-15'),
                'ETD' => date('Y-m-d H:i:s'),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id_kapal' => "1-2949-DV",
                'id_rute' => '2',
                'asal_pelabuhan_id' => 'IDTPP',
                'tujuan_pelabuhan_id' => 'IDKTG',
                'ETA' => Carbon::parse('2022-10-15'),
                'ETD' => date('Y-m-d H:i:s'),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id_kapal' => "1-2949-DV",
                'id_rute' => '2',
                'asal_pelabuhan_id' => 'IDKTG',
                'tujuan_pelabuhan_id' => 'IDKAT',
                'ETA' => Carbon::parse('2022-10-15'),
                'ETD' => date('Y-m-d H:i:s'),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
         ]);
    }
}
