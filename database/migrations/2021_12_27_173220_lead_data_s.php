<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class LeadDataS extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('lead_data_s',function(Blueprint $table){
            $table->id();
            $table->integer('leads_id'); //Foreign Key
            $table->integer('person_id'); //Foreign Key
            $table->string('nationality')->nullable();
            $table->string('residence_permit')->nullable();
            $table->string('telephone_nr')->nullable();
            $table->string('email')->nullable();
            $table->string('zivilstand')->nullable();
            $table->string('employment_relationship')->nullable();
            $table->string('job')->nullable();
            $table->string('payment_frequency')->nullable();
            $table->string('amount_per_month')->nullable();
            $table->string('share_guarantee')->nullable();
            $table->string('start_of_contract')->nullable();
            $table->string('premium_exemption')->nullable();
            $table->string('eu_pension')->nullable();
            $table->string('death_benefit')->nullable();
            $table->string('smoker')->nullable();
            $table->string('desired')->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->string('nationality_sachen')->nullable();
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
