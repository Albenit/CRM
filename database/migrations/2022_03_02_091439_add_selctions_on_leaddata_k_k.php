<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSelctionsOnLeaddataKK extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('lead_data_kk', function (Blueprint $table) {
            $table->string('vorversicherer_select')->nullable();
            $table->string('id_notwending_select')->nullable();
            $table->string('kundingung_durch_select')->nullable();
            $table->string('vollmacht_select')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('lead_data_kk', function (Blueprint $table) {
            //
        });
    }
}
