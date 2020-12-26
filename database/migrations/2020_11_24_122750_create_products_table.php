<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('productID');
            $table->string('productName');
            $table->integer('productPrice');
            $table->string('productDetail')->default("ABCD");
            $table->integer('productQuantity')->default(1);
            $table->string('productDescription')->default("Deskripsi");
            $table->string('productCategory');
            $table->string('productBrand');
            $table->string('fotoProduk');

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
        Schema::dropIfExists('products');
    }
}
