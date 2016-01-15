<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('username')->unique();
            $table->string('email')->unique();
            $table->string('password', 60);
            $table->enum('active',['1','0']);
            $table->string('nik', 30)->nullable();
            $table->string('alamat')->nullable();
            $table->string('no_kartu_nelayan',30)->nullable();
            $table->string('id_kelompok')->nullable();
            $table->integer('id_jabatan')->nullable();
            $table->integer('id_usaha')->nullable();
            $table->enum('profesi', ['Pembudidaya','Nelayan','Admin']);
            $table->dateTime('tgl_password')->nullable();
            $table->rememberToken();
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
        Schema::drop('users');
    }
}
