<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TableStatistik extends Migration
{
    public function up()
    {
        Schema::create('site_statistik', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ip',15);
            $table->date('tanggal');
            $table->char('hits',4);
            $table->string('online',20);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('site_statistik');
    }
}
