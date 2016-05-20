<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableTerumbuRehabilitasi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('app_terumbu_rehabilitasi', function(Blueprint $table){
            $table->increments('id');
            $table->string('kecamatan');
            $table->string('desa');
            $table->integer('direhabilitasi');
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
        //
    }
}
