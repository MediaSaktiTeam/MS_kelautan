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
            $table->string('mas');
            $table->string('nila');
            $table->string('lele');
            $table->string('bawal');
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
