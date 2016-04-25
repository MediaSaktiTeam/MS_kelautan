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
            $table->string('rtp');
            $table->string('panjang_pantai');
            $table->string('potensi');
            $table->string('luas_tanam');
            $table->string('penebaran_windu');
            $table->string('penebaran_vanamae');
            $table->string('penebaran_bandeng');
            $table->string('jumlah_hidup_windu');
            $table->string('jumlah_hidup_vanamae');
            $table->string('jumlah_hidup_bandeng');
            $table->string('pakan_pelet');
            $table->string('pakan_dedak');
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
