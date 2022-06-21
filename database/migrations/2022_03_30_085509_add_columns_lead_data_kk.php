<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsLeadDataKk extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('lead_data_kk', function (Blueprint $table) {
            $table->string('mandatiert_select')->nullable();
            $table->string('mandatiert_step_two')->nullable();
            $table->string('kundigung_step_two')->nullable();
            $table->string('kranken_file')->nullable();
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
            $table->dropColumn(['mandatiert_select','mandatiert_step_two','kundigung_step_two','kranken_file']);
        });
    }
}
