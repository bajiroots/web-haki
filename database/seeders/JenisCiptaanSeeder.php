<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class JenisCiptaanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() 
    {
        DB::insert("INSERT INTO jenis_ciptaans (id,nama_jenis_ciptaan) VALUES
        (1, 'Karya Tulis'),
        (2, 'Karya Seni'),
        (3, 'Komposisi Musik'),
        (4, 'Karya Audio Visual'),
        (5, 'Karya Fotografi'),
        (6, 'Karya Drama & Koreografi'),
        (7, 'Karya Rekaman'),
        (8, 'Karya Lainnya')");
    }
}
