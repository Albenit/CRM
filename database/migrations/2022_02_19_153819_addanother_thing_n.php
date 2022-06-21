<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddanotherThingN extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addanother_thing_n', function (Blueprint $table) {
            $table->id();
            $table->string('vehicle_id')->nullable();
            $table->integer('person_id')->index();
            $table->string('leasing')->nullable();
            $table->string('leasing_name')->nullable();
            $table->string('year_of_purchase')->nullable();
            $table->string('placing_on_the_market')->nullable();
            $table->string('nationality')->nullable();
            $table->string('insurance_date')->nullable();
            $table->string('most_common')->nullable();
            $table->string('redeemed')->nullable();
            $table->string('km_stood')->nullable();
            $table->string('insurance')->nullable();
            $table->string('traffic_legal_protection')->nullable();
            $table->string('deductible')->nullable();
            $table->string('glass_protection')->nullable();
            $table->string('carried')->nullable();
            $table->string('parking_damage')->nullable();
            $table->string('repair_shop')->nullable();
            $table->string('hour_breakdown_assistance')->nullable();
            $table->string('accident_coverage')->nullable();
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
        Schema::table('addanother_thing_n', function (Blueprint $table) {
            $table->drop('addanother_thing_n');
        });
    }
}
