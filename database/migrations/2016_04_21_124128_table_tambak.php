<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TableTambak extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('app_tambak', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('provinsi');
            $table->string('kabupaten');
            $table->string('kecamatan');
            $table->string('desa');
            $table->integer('rtp');
            $table->integer('panjang_pantai');
            $table->integer('potensi');
            $table->integer('luas_tanam');
            $table->integer('penebaran_windu');
            $table->integer('penebaran_vanamae');
            $table->integer('penebaran_bandeng');
            $table->integer('jumlah_hidup_windu');
            $table->integer('jumlah_hidup_vanamae');
            $table->integer('jumlah_hidup_bandeng');
            $table->integer('pakan_pelet');
            $table->integer('pakan_dedak');
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
        Schema::drop('app_tambak');
    }
}
