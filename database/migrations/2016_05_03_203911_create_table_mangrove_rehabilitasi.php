<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableMangroveRehabilitasi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
   public function up()
    {
        Schema::create('app_mangrove_rehabilitasi', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('kecamatan');
            $table->string('desa');
            $table->integer('direhabilitasi');
            $table->integer('berubah_fungsi');
            $table->integer('lahan_tambak');
            $table->integer('penggaraman');
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
