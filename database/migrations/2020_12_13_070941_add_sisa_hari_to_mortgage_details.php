<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSisaHariToMortgageDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('mortgage_details', function (Blueprint $table) {
            $table->integer('sisaHari')->nullable()->default(null);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('mortgage_details', function (Blueprint $table) {
            $table->dropColumn('sisaHari'); 
        });
    }
}
