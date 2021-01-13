<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetailtransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detailtransactions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedbigInteger('IDProduct');
            $table->foreign('IDProduct')->references('productID')->on('products')->onDelete('cascade');
            $table->unsignedbigInteger('transaction_id');
            $table->foreign('transaction_id')->references('id')->on('totaltransactions')->onDelete('cascade');
            $table->integer('quantity');
            $table->integer('total_price');
            $table->string('pesan');
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
        Schema::dropIfExists('detailtransactions');
    }
}
