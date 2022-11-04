<?php

namespace Database\Seeders;

use App\Http\Controllers\BookingController;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            // UserTableSeeder::class,
            // StoreTableSeeder::class,
            // PelabuhanTableSeeder::class,
            // RuteTableSeeder::class,
            // KapalTableSeeder::class,
            //JadwalKapalTableSeeder::class,
            // JenisContainerTableSeeder::class,
            // ContainerTableSeeder::class,
            // JenisBarangTableSeeder::class,
            // BarangTableSeeder::class,
            // BookingTableSeeder::class,
        ]);
    }
}