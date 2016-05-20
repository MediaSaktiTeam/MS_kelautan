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
            $table->integer('rtp');
            $table->integer('panjang_pantai');
            $table->integer('potensi');
            $table->integer('luas_tanam');
            $table->integer('bentangan');
            $table->integer('bibit_cottoni');
            $table->integer('bibit_spinosum');
            $table->integer('cottoni_basah');
            $table->integer('cottoni_kering');
            $table->integer('spinosum_basah');
            $table->integer('spinosum_kering');
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
        Schema::drop('app_rumput_laut');
    }
}
