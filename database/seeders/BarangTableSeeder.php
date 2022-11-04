<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BarangTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('barang')->insert([
            [
                'jenis_barang' => "1",
                'nama_barang' => 'Pisang Ambon',
                'berat' => '1000',
                'Qty' => '1'
            ],
        ]);
    }
}
