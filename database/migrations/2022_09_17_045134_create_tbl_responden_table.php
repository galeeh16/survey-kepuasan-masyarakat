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
        Schema::create('tbl_responden', function (Blueprint $table) {
            $table->id();
            $table->string('namaresponden');
            $table->string('usia');
            $table->string('jeniskelamin');
            $table->string('pendidikan');
            $table->string('pekerjaan');
            $table->string('nohp');
            $table->string('nik');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_responden');
    }
};
