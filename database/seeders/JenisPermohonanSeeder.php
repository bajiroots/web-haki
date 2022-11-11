<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\JenisPermohonan;

class JenisPermohonanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        JenisPermohonan::create([
            'nama_jenis_permohonan' => 'UMUM',
        ]);
        JenisPermohonan::create([
            'nama_jenis_permohonan' => 'POLITANI',
        ]);
    }
}
