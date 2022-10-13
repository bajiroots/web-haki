<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProvinsiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::insert("INSERT INTO provinsis (id, nama_provinsi) VALUES
        (1, 'ACEH'),
        (2, 'SUMATERA UTARA'),
        (3, 'SUMATERA BARAT'),
        (4, 'RIAU'),
        (5, 'JAMBI'),
        (6, 'SUMATERA SELATAN'),
        (7, 'BENGKULU'),
        (8, 'LAMPUNG'),
        (9, 'KEPULAUAN BANGKA BELITUNG'),
        (10, 'KEPULAUAN RIAU'),
        (11, 'DKI JAKARTA'),
        (12, 'JAWA BARAT'),
        (13, 'JAWA TENGAH'),
        (14, 'DI YOGYAKARTA'),
        (15, 'JAWA TIMUR'),
        (16, 'BANTEN'),
        (17, 'BALI'),
        (18, 'NUSA TENGGARA BARAT'),
        (19, 'NUSA TENGGARA TIMUR'),
        (20, 'KALIMANTAN BARAT'),
        (21, 'KALIMANTAN TENGAH'),
        (22, 'KALIMANTAN SELATAN'),
        (23, 'KALIMANTAN TIMUR'),
        (24, 'KALIMANTAN UTARA'),
        (25, 'SULAWESI UTARA'),
        (26, 'SULAWESI TENGAH'),
        (27, 'SULAWESI SELATAN'),
        (28, 'SULAWESI TENGGARA'),
        (29, 'GORONTALO'),
        (30, 'SULAWESI BARAT'),
        (31, 'MALUKU'),
        (32, 'MALUKU UTARA'),
        (33, 'PAPUA'),
        (34, 'PAPUA BARAT')");
    }
}
