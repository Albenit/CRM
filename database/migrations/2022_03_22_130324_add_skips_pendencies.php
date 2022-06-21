<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSkipsPendencies extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pendencies', function (Blueprint $table) {
            $table->integer('kranken_skip')->nullable();
            $table->integer('auto_skip')->nullable();
            $table->integer('vorsorge_skip')->nullable();
            $table->integer('sachen_skip')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pendencies', function (Blueprint $table) {
            $table->dropIfExists();
        });
    }
}
