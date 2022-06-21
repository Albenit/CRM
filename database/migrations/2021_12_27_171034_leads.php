<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Leads extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::drop('leads');
        Schema::create('leads',function(Blueprint $table){
            $table->id();
            $table->string('first_name')->index();
            $table->string('last_name')->index();
            $table->string('telephone');
            $table->date('birthdate')->nullable();
            $table->string('city')->nullable();
            $table->string('address')->nullable();
            $table->integer('postal_code')->nullable();
            $table->double('latitude', 11, 8)->nullable();
            $table->double('longitude', 11, 8)->nullable();
            $table->integer('number_of_persons')->nullable();
            $table->string('nationality')->nullable();
            $table->string('slug')->nullable();
            $table->string('status_task')->nullable();
            $table->string('status_contract')->nullable();
            $table->boolean('completed')->default(0)->index();
            $table->date('appointment_date')->nullable()->index();
            $table->integer('campaign_id'); //Foreign Key
            $table->integer('assign_to_id')->nullable()->index(); //Foreign Key
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
            $table->string('begrundung')->nullable();
            $table->string('begrundung2')->nullable();
            $table->string('begrundungfile2')->nullable();
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
