<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RuteTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('rute')->insert([
            [
                'id_trip' => "1",
                'asal_pelabuhan_id' => 'A',
                'tujuan_pelabuhan_id' => 'B',
                'urutan' => '1',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id_trip' => "1",
                'asal_pelabuhan_id' => 'B',
                'tujuan_pelabuhan_id' => 'C',
                'urutan' => '2',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id_trip' => "2",
                'asal_pelabuhan_id' => 'IDTJP',
                'tujuan_pelabuhan_id' => 'IDTPP',
                'urutan' => '1',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id_trip' => "2",
                'asal_pelabuhan_id' => 'IDTPP',
                'tujuan_pelabuhan_id' => 'IDKTG',
                'urutan' => '2',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id_trip' => "2",
                'asal_pelabuhan_id' => 'IDKTG',
                'tujuan_pelabuhan_id' => 'IDKAT',
                'urutan' => '3',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
        ]);
    }
}
