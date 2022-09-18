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
            $table->unsignedBigInteger('penilaian')->nullable();
            $table->datetime('tanggalsurvey')->nullable();

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
