<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSettingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('site_setting', function (Blueprint $table) {
            $table->increments('id');
            $table->string('sitename',100);
            $table->string('description');
            $table->string('email',100);
            $table->string('tag');
            $table->string('fb');
            $table->string('twitter');
            $table->string('gambar_utama', 50);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('site_setting');
    }
}
