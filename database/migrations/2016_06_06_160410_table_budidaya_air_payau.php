<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TableBudidayaAirPayau extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('app_budidaya_air_payau', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('lokasi');
            $table->integer('rtp');
            $table->integer('potensi');
            $table->integer('luas_tanam');
            $table->integer('bibit_bandeng');
            $table->integer('bibit_windu');
            $table->integer('bibit_vannamae');
            $table->integer('bibit_lainnya');
            $table->integer('produksi_bandeng');
            $table->integer('produksi_windu');
            $table->integer('produksi_vannamae');
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
        Schema::drop('app_budidaya_air_payau');
    }
}
