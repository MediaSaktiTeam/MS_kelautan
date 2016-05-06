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
            $table->integer('rtp');
            $table->integer('luas_areal');
            $table->integer('luas_tanam');
            $table->integer('penebaran_mas');
            $table->integer('penebaran_nila');
            $table->integer('penebaran_lele');
            $table->integer('penebaran_bawal');
            $table->integer('jumlah_hidup_mas');
            $table->integer('jumlah_hidup_nila');
            $table->integer('jumlah_hidup_lele');
            $table->integer('jumlah_hidup_bawal');
            $table->string('keterangan');
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
