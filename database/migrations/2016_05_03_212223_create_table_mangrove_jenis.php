<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableMangroveJenis extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
   public function up()
    {
        Schema::create('app_mangrove_jenis', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('kecamatan');
            $table->string('jenis_mangrove');
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
