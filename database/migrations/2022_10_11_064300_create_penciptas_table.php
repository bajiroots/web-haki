<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenciptasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penciptas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('permohonan_id')->constrained();
            $table->foreignId('kota_id')->constrained();
            $table->string('nama');
            $table->string('email');
            $table->string('no_telp');
            $table->text('alamat');
            $table->string('kode_pos');
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
        Schema::dropIfExists('penciptas');
    }
}
