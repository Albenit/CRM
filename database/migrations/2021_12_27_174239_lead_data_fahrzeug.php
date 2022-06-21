<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class LeadDataFahrzeug extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //

        Schema::create('lead_data_fahrzeug',function(Blueprint $table){
            $table->id();
            $table->integer('leads_id'); //Foreign Key
            $table->integer('person_id'); //Foreign Key
            $table->string('upload_police')->nullable();
            $table->string('vehicle_id')->nullable();
            $table->string('leasing')->nullable();
            $table->string('leasing_name')->nullable();
            $table->string('year_of_purchase')->nullable();
            $table->string('placing_on_the_market')->nullable();
            $table->date('insurance_date')->nullable();
            $table->string('redeemed')->nullable();
            $table->string('km_stood')->nullable();
            $table->string('issue_date')->nullable();
            $table->string('nationality')->nullable();
            $table->string('most_common')->nullable();
            $table->string('insurance')->nullable();
            $table->string('deductible')->nullable();
            $table->string('carried')->nullable();
            $table->string('repair_shop')->nullable();
            $table->string('accident_coverage')->nullable();
            $table->string('traffic_legal_protection')->nullable();
            $table->string('grossly')->nullable();
            $table->string('glass_protection')->nullable();
            $table->string('parking_damage')->nullable();
            $table->string('hour_breakdown_assistance')->nullable();
            $table->string('comment')->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
            $table->string('first_intro')->nullable();
            $table->string('offer')->nullable();
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
