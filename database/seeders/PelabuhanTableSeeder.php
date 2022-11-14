<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PelabuhanTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       DB::table('pelabuhan')->insert([
            [
                'kode_pelabuhan' => "IDTJP",
                'nama_pelabuhan' => 'Tanjung Perak',
                'alamat' => 'Surabaya',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'kode_pelabuhan' => "IDTPP",
                'nama_pelabuhan' => 'Tajung Priok',
                'alamat' => '-',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'kode_pelabuhan' => "IDKTG",
                'nama_pelabuhan' => 'Ketapang',
                'alamat' => 'Banyuwangi',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'kode_pelabuhan' => "IDKAT",
                'nama_pelabuhan' => 'Kalianget',
                'alamat' => 'Surabaya',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'kode_pelabuhan' => "IDMRK",
                'nama_pelabuhan' => 'Merak',
                'alamat' => 'Banten',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'kode_pelabuhan' => "IDCGK",
                'nama_pelabuhan' => 'Soekarno-Hatta',
                'alamat' => 'Makassar',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],

            [
                'kode_pelabuhan' => "A",
                'nama_pelabuhan' => 'Pelabuhan A',
                'alamat' => '-',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'kode_pelabuhan' => "B",
                'nama_pelabuhan' => 'Pelabuhan B',
                'alamat' => '-',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'kode_pelabuhan' => "C",
                'nama_pelabuhan' => 'Pelabuhan C',
                'alamat' => '-',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'kode_pelabuhan' => "D",
                'nama_pelabuhan' => 'Pelabuhan D',
                'alamat' => '-',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'kode_pelabuhan' => "E",
                'nama_pelabuhan' => 'Pelabuhan E',
                'alamat' => '-',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'kode_pelabuhan' => "F",
                'nama_pelabuhan' => 'Pelabuhan F',
                'alamat' => '-',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'kode_pelabuhan' => "G",
                'nama_pelabuhan' => 'Pelabuhan G',
                'alamat' => '-',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'kode_pelabuhan' => "H",
                'nama_pelabuhan' => 'Pelabuhan H',
                'alamat' => '-',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'kode_pelabuhan' => "I",
                'nama_pelabuhan' => 'Pelabuhan I',
                'alamat' => '-',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],

        ]);
    }
}
