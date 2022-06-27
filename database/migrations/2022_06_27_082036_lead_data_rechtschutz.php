<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class LeadDataRechtschutz extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lead_data_rech', function (Blueprint $table) {
            $table->id();
            $table->integer('leads_id');
            $table->integer('person_id');
            $table->string('id_select')->nullable();
            $table->string('vertrag_select')->nullable();
            $table->string('upload_file')->nullable();
            $table->string('zugeisen_person')->nullable();
            $table->string('gesellchaft')->nullable();
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
        Schema::dropIfExists('lead_data_rech');
    }
}
