<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'kota_id' => '99',
            'name' => 'dicky armansyah',
            'level' => 'admin',
            'username' => 'superadmin',
            'no_ktp' => '1',
            'tgl_lahir' => '2022-10-11',
            'alamat' => 'ec',
            'kode_pos' => '666',
            'jenis_kelamin' => 'laki-laki',
            'email' => 'superadmin@mail.com',
            'password' => bcrypt('superadmin123!'),
        ]);
    }
}
