<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BiayaJenisCiptaanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() 
    {
        $hargaUmum = 500000;
        $hargaPotni = 300000;
        $hargaKaryaLainnyaUmum = 800000;
        $hargaKaryaLainnyaPotni = 500000;
        DB::insert("INSERT INTO biaya_jenis_ciptaans (id,jenis_ciptaan_id,jenis_permohonan_id,biaya) VALUES
        (1, 1, 1, $hargaUmum),
        (2, 1, 2, $hargaPotni),
        (3, 2, 1, $hargaUmum),
        (4, 2, 2, $hargaPotni),
        (5, 3, 1, $hargaUmum),
        (6, 3, 2, $hargaPotni),
        (7, 4, 1, $hargaUmum),
        (8, 4, 2, $hargaPotni),
        (9, 5, 1, $hargaUmum),
        (10, 5, 2, $hargaPotni),
        (11, 6, 1, $hargaUmum),
        (12, 6, 2, $hargaPotni),
        (13, 7, 1, $hargaUmum),
        (14, 7, 2, $hargaPotni),
        (15, 8, 1, $hargaKaryaLainnyaUmum),
        (16, 8, 2, $hargaKaryaLainnyaPotni)");
    }
}

