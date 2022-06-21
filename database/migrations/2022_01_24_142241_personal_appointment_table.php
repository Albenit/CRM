<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PersonalAppointmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personalAppointment',function (Blueprint $table){
           $table->id();
           $table->string('title');
           $table->time('time');
           $table->string('address');
           $table->string('comment');
           $table->integer('user_id');
           $table->integer('AppOrCon');
           $table->integer('assignfrom');
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
        Schema::dropIfExists('personalAppointment');
    }
}
