<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TableBudidayaKjaAirLaut extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('app_kja_air_laut', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('lokasi');
            $table->integer('panjang_pantai');
            $table->integer('rtp');
            $table->integer('potensi');
            $table->integer('luas_tanam');
            $table->integer('bibit_kakap');
            $table->integer('bibit_udang');
            $table->integer('bibit_lainnya');
            $table->integer('produksi_kakap');
            $table->integer('produksi_udang');
            $table->integer('produksi_lainnya');
            $table->string('keterangan');
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
        Schema::drop('app_kja_air_laut');
    }
}
