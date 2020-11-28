<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTempTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('temp', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('productName');
            $table->integer('productPrice');
            $table->string('productDetail')->default("ABCD");
            $table->integer('productQuantity')->default(1);
            $table->string('productDescription')->default("Deskripsi");
            $table->integer('customerID');
            $table->integer('loan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('temp');
    }
}
