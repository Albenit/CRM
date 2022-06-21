<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class LeadDataSW extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('lead_data_s_w',function(Blueprint $table){
            $table->id();
            $table->integer('leads_id'); //Foreign Key
            $table->integer('person_id'); //Foreign Key
            $table->string('upload_police')->nullable();
            $table->string('comparison_type')->nullable();
            $table->string('comment')->nullable();
            $table->integer('number_of_people')->nullable();
            $table->integer('number_of_rooms')->nullable();
            $table->string('sum_insured')->nullable();
            $table->string('desired_additional_coverage')->nullable();
            $table->string('personal_liability')->nullable();
            $table->string('society')->nullable();
            $table->string('n_of_p_legal_protection')->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
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
