<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBiayaJenisCiptaansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('biaya_jenis_ciptaans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('jenis_ciptaan_id')->constrained();
            $table->foreignId('jenis_permohonan_id')->constrained();
            $table->string('biaya');
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
        Schema::dropIfExists('biaya_jenis_ciptaans');
    }
}
