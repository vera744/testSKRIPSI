<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlamatpengirimansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alamatpengirimans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('userID')->references('id')->on('users');
            $table->string('namaPenerima');
            $table->string('nomorHP');
            $table->string('alamat');
            $table->string('provinsi');
            $table->string('kota');
            $table->string('statusAlamat')->nullable();
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
        Schema::dropIfExists('alamatpengirimans');
    }
}
