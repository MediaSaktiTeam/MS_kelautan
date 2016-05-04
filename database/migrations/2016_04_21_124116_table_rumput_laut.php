<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TableRumputLaut extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('app_rumput_laut', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('provinsi');
            $table->string('kabupaten');
            $table->string('kecamatan');
            $table->string('desa');
            $table->string('rtp');
            $table->string('panjang_pantai');
            $table->string('potensi');
            $table->string('luas_tanam');
            $table->string('bentangan');
            $table->string('bibit_cottoni');
            $table->string('bibit_spinosum');
            $table->string('cottoni_basah');
            $table->string('cottoni_kering');
            $table->string('spinosum_basah');
            $table->string('spinosum_kering');
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
        Schema::drop('app_rumput_laut');
    }
}
