<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddKrankId extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('lead_data_kk', function (Blueprint $table) {
            $table->integer('krank_id')->nullable();
            $table->integer('skiped')->default(0);
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
            $table->dropColumn('krank_id');
        });
    }
}
