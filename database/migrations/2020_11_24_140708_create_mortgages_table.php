<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMortgagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mortgages', function (Blueprint $table) {
            $table->bigIncrements('mortgageID');
            $table->unsignedbigInteger('productID');
            $table->unsignedbigInteger('customerID');
            $table->timestamps();
            $table->foreign('productID')->references('productID')->on('products');
            $table->foreign('customerID')->references('id')->on('users');
            $table->foreign('adminID')->references('id')->on('admins');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mortgages');
    }
}
