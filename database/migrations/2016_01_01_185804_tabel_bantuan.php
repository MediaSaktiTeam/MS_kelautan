<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TabelBantuan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    
        Schema::create('app_bantuan', function(Blueprint $t)
        {
            $t->bigIncrements('id');
            $t->string('id_user');
            $t->string('id_bantuan');
            $t->string('nama_program');
            $t->string('tahun',4);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('app_bantuan');
    }
}
