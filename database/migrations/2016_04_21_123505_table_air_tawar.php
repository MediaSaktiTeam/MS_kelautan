<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TableAirTawar extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('app_air_tawar', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('provinsi');
            $table->string('kabupaten');
            $table->string('kecamatan');
            $table->string('desa');
            $table->string('rtp');
            $table->string('luas_areal');
            $table->string('luas_tanam');
            $table->string('penebaran_mas');
            $table->string('penebaran_nila');
            $table->string('penebaran_lele');
            $table->string('penebaran_bawal');
            $table->string('jumlah_hidup_mas');
            $table->string('jumlah_hidup_nila');
            $table->string('jumlah_hidup_lele');
            $table->string('jumlah_hidup_bawal');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('app_air_tawar');
    }
}
