<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Deletedlead extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deletedlead',function (Blueprint $table){
           $table->id();
           $table->string('name');
           $table->string('address')->nullable();
           $table->integer('count');
           $table->date('date');
           $table->string('reason');
           $table->string('comment');
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
        Schema::dropIfExists('deletedlead');
    }
}
