<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kota_id')->constrained();
            $table->string('name');
            $table->enum('level',['user','admin']);
            $table->string('username');
            $table->string('no_ktp');
            $table->date('tgl_lahir');
            $table->text('alamat');
            $table->string("kode_pos");
            $table->enum('jenis_kelamin',['laki-laki','perempuan']);
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
