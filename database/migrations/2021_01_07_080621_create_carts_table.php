<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->unsignedbigInteger('IDProduct');
            $table->unsignedbigInteger('customerID');
            $table->foreign('IDProduct')->references('productID')->on('products')->onDelete('cascade');
            $table->foreign('customerID')->references('id')->on('users');
            $table->integer('total_price');
            $table->integer('totalWeight');
            $table->integer('quantity');
        });

       
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('carts');
    }
}
