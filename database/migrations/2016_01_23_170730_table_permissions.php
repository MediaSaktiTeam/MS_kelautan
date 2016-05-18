<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TablePermissions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permissions', function (Blueprint $table) {
            $table->integer('id_user');
            $table->enum('pembudidaya', ['0', '1'])->default(0);
            $table->enum('nelayan', ['0', '1'])->default(0);
            $table->enum('pengolah', ['0', '1'])->default(0);
            $table->enum('pesisir', ['0', '1'])->default(0);
            $table->enum('blog', ['0', '1'])->default(0);
            $table->enum('admin', ['0', '1'])->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('permissions');
    }
}
