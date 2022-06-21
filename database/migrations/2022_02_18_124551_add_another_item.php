<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAnotherItem extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       
        Schema::create('add_another_item_g', function (Blueprint $table) {
            $table->id();
            
            $table->string('upload_policeFahrzeug')->nullable();
            $table->string('comparison_type')->nullable();
            $table->string('commentFahrenzug')->nullable();
            $table->string('offer')->nullable();
            $table->integer('person_id')->index();
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
        Schema::dropIfExists('add_another_item_g');
    }
}
