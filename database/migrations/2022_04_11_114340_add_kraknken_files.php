<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddKraknkenFiles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('lead_data_kk', function (Blueprint $table) {
            $table->string('kundingurung_durch_file_dlf')->nullable();
            $table->string('kundingurung_durch_file_kunde')->nullable();
            $table->string('mandatiert_file')->nullable();

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
