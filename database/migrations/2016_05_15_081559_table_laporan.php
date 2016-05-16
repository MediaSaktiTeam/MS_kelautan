<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TableLaporan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('app_laporan', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama');
            $table->string('nip');
            $table->string('jabatan');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('app_laporan');
    }
}
