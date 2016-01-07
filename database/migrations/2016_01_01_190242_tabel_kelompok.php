<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TabelKelompok extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    
        Schema::create('app_kelompok', function(Blueprint $t)
        {
            $t->increments('id');
            $t->string('nama',50);
            $t->string('alamat')->nullable();
            $t->string('no_rekening',30)->nullable();
            $t->string('nama_rekening', 50)->nullable();
            $t->enum('tipe', ['Pembudidaya','Nelayan']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('app_kelompok');
    }
}
