<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class LeadInfo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lead_info', function (Blueprint $table) {
            $table->id();
            $table->integer('lead_id')->nullable();
            $table->string('krankenkasse')->nullable();
            $table->string('teilnahme')->nullable();
            $table->string('wichtig')->nullable();
            $table->string('bewertung')->nullable();
            $table->string('grund')->nullable();
            $table->string('kampagne')->nullable();
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
        Schema::dropIfExists('lead_info');
    }
}
