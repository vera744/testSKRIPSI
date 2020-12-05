<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMortgageDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mortgage_details', function (Blueprint $table) {
            $table->bigIncrements('mDetailID');
            $table->unsignedbigInteger('mortgageID');
        $table->integer('loan');
        $table->integer('duration')->default(3);
        $table->foreign('mortgageID')->references('mortgageID')->on('mortgages');
        $table->string('status')->default('Sedang Ditinjau');
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
        Schema::dropIfExists('mortgage_details');
    }
}
