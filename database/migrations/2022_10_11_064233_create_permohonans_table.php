<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePermohonansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permohonans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->foreignId('jenis_permohonan_id')->constrained();
            $table->foreignId('sub_jenis_ciptaan_id')->constrained();
            $table->string('nomor_permohonan');
            $table->string('tgl_pengajuan');
            $table->string('judul_ciptaan');
            $table->text('deskripsi');
            $table->string('kota_pertama_diumumkan');
            $table->string('foto_bukti_bayar_wajib');
            $table->string('foto_ktp_wajib');
            $table->string('surat_pernyataan_wajib');
            $table->string('contoh_ciptaan_wajib');
            $table->string('bukti_pengalihan_hak_cipta')->nullable();
            $table->enum('status',['proses','terima','tolak']);
            $table->string('no_sertifikat')->nullable();
            $table->string('foto_sertifikat')->nullable();
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
        Schema::dropIfExists('permohonans');
    }
}
