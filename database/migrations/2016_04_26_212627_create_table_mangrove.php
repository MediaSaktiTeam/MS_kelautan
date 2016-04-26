<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableMangrove extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
    {
        Schema::create('app_mangrove', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('kecamatan');
            $table->string('desa');
            $table->integer('luas_lahan');
            $table->integer('kondisi_rusak');
            $table->integer('kondisi_sedang');
            $table->integer('kondisi_baik');
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
