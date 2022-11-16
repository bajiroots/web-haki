<?php

namespace Database\Seeders;

use App\Models\JenisCiptaan;
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
            ProvinsiSeeder::class,
            KotaSeeder::class,
            UserSeeder::class,
            JenisPermohonanSeeder::class,
            JenisCiptaanSeeder::class,
            BiayaJenisCiptaanSeeder::class,
            SubJenisCiptaanSeeder::class,
        ]);
    }
}
