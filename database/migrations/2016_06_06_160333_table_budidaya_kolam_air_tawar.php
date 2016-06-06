<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TableBudidayaKolamAirTawar extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('app_kolam_air_tawar', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('lokasi');
            $table->integer('rtp');
            $table->integer('potensi');
            $table->integer('luas_tanam');
            $table->integer('bibit_nila');
            $table->integer('bibit_lele');
            $table->integer('bibit_udang');
            $table->integer('bibit_lainnya');
            $table->integer('produksi_nila');
            $table->integer('produksi_lele');
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
        Schema::drop('app_kolam_air_tawar');
    }
}
