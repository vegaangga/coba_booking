<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JenisBarangTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('jenis_barang')->insert([
            [
                'jenis_barang' => "buah",
                'suhu'=>'18'
            ],
            [
                'jenis_barang' => "vaksin",
                'suhu'=>'10'
            ],
        ]);
    }
}
