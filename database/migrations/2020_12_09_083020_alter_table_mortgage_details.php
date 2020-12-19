<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTableMortgageDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('mortgage_details',function(Blueprint $table){

        $table->date('startDate')->nullable()->default(null);
        $table->date('endDate')->nullable()->default(null);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('mortgage_details',function(Blueprint $table){

            $table->dropColumn('startDate');
            $table->dropColumn('endDate');
    
            });
    }
}
