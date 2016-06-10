<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TableBudidayaRumputLaut extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('app_budidaya_rumput_laut', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('lokasi');
            $table->integer('panjang_pantai');
            $table->integer('rtp');
            $table->integer('potensi');
            $table->integer('luas_tanam');
            $table->integer('jumlah_bibit');
            $table->integer('produksi_catoni');
            $table->integer('produksi_spenosun');
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
         Schema::drop('app_budidaya_rumput_laut');
    }
}
