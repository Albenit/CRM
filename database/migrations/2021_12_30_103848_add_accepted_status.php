<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAcceptedStatus extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('lead_data_a_counteroffered',function(Blueprint $table){
            $table->boolean('accepted')->default(0);
        });
        Schema::table('lead_data_fahrzeug',function(Blueprint $table){
            $table->boolean('accepted')->default(0);
        });
        Schema::table('lead_data_kk',function(Blueprint $table){
            $table->boolean('accepted')->default(0);
        });
        Schema::table('lead_data_s',function(Blueprint $table){
            $table->boolean('accepted')->default(0);
        });
        Schema::table('lead_data_s_w',function(Blueprint $table){
            $table->boolean('accepted')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
