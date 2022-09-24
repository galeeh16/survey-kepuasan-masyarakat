<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_kuesioner', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_responden');
            $table->unsignedBigInteger('id_layanan');
            $table->unsignedBigInteger('id_pertanyaan');
            $table->unsignedBigInteger('id_jawaban');
            $table->unsignedBigInteger('penilaian')->nullable(); // ??
            $table->datetime('created_at')->useCurrent();

            // ??
            $table->datetime('tanggal_ak1')->nullable();
            $table->datetime('tanggal_rekom_passport')->nullable();
            $table->datetime('tanggal_pelatihan')->nullable();
            $table->datetime('tanggal_lpk')->nullable();
            $table->datetime('tanggal_pencatatan_perusahaan')->nullable();
            $table->datetime('tanggal_perselisihan_hub_industrial')->nullable();
            // 

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_kuesioner');
    }
};
