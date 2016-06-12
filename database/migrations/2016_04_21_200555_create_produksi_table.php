<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProduksiTable extends Migration
{

    public function up()
    {
        Schema::create('produksi', function(Blueprint $table){
            $table->Increments('id');
            $table->integer('id_user');
            $table->string('jenis_produksi');
            $table->string('biaya_produksi');
            $table->string('jenis_ikan')->nullable();
            $table->date('waktu_produksi');
        });
    }

    public function down()
    {
        Schema::drop('produksi');
    }
}