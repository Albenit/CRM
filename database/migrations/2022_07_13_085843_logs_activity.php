<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class LogsActivity extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    // type 1 stand for form
    // type 2 stand for products
    // type 3 stand for edit personaldata
    // type 4 stand for manualy inserted client
    public function up()
    {
        Schema::create('logs_activity',function(Blueprint $table){
            $table->id();
            $table->integer('edited_from')->nullable();
            $table->integer('person_id')->nullable();
            $table->json('old_data')->nullable();
            $table->json('new_data')->nullable();
            $table->string('description')->nullable();
            $table->integer('type')->nullable();
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
        //
    }
}
