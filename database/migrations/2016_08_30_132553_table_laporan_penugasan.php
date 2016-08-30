<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TableLaporanPenugasan extends Migration
{
    public function up()
    {
        Schema::create('app_laporan_penugasan', function(Blueprint $t){
            $t->increments('id');
            $t->string('halaman');
            $t->string('kolom_kiri');
            $t->string('kolom_kanan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('app_laporan_penugasan');
    }
}
