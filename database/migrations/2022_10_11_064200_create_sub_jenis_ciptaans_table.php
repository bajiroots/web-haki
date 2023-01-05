<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubJenisCiptaansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_jenis_ciptaans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('jenis_ciptaan_id')->constrained();
            $table->string('nama_sub_jenis_ciptaan');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sub_jenis_ciptaans');
    }
}
