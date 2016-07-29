<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlogSambutanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('site_sambutan', function (Blueprint $table) {
            $table->Increments('id');
            $table->string('nama');
            $table->string('nip');
            $table->string('jabatan');
            $table->date('tgl');
            $table->text('deskripsi');
            $table->text('sambutan');
            $table->string('foto');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('site_sambutan');
    }
}
