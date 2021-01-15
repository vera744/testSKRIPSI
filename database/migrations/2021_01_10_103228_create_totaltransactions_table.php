<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTotaltransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('totaltransactions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedbigInteger('customerID');
            $table->foreign('customerID')->references('id')->on('users');
            $table->string('pesan');
            $table->string('paymentID')->references('id')->on('payment_methods');
            $table->integer('ongkirID');
            $table->integer('grandtotal');
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
        Schema::dropIfExists('totaltransactions');
    }
}
