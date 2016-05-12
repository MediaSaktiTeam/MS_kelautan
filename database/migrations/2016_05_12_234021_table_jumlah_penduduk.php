<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TableJumlahPenduduk extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('app_jumlah_penduduk', function(Blueprint $table){
            $table->increments('id');
            $table->string('kecamatan');
            $table->integer('laki');
            $table->integer('perempuan');
            $table->integer('jumlah_kk');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
