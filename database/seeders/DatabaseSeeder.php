<?php

namespace Database\Seeders;

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
            //UserTableSeeder::class,
            //StoreTableSeeder::class,
            //PelabuhanTableSeeder::class,

            JenisContainerTableSeeder::class,
            JenisBarangTableSeeder::class,
            BarangTableSeeder::class,

            TripTableSeeder::class,
            RuteTableSeeder::class,
            KapalTableSeeder::class,
            JadwalKapalTableSeeder::class,
            ContainerTableSeeder::class,
            BookingTableSeeder::class,
        ]);
    }
}
