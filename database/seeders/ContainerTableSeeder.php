<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContainerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('container')->insert([
            [
                'jenis_container' => "1",
                'kode_container' => 'A-001',
                'kapasitas_berat' => '1000',
                'kode_kapal' => '1-2930-DV'
            ],
            [
                'jenis_container' => "1",
                'kode_container' => 'A-002',
                'kapasitas_berat' => '1000',
                'kode_kapal' => '1-2930-DV'
            ],
            [
                'jenis_container' => "2",
                'kode_container' => 'B-002',
                'kapasitas_berat' => '5000',
                'kode_kapal' => '1-2949-DV'
            ],
            [
                'jenis_container' => "2",
                'kode_container' => 'B-002',
                'kapasitas_berat' => '500',
                'kode_kapal' => '1-2949-DV'
            ],
        ]);
    }
}
