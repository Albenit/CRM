<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MakeProvisionId extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('costumer_podukt_zusatzversicherung', function (Blueprint $table) {
            $table->integer('prov_id')->nullable();
        });
        Schema::table('costumer_produkt_autoversicherung', function (Blueprint $table) {
            $table->integer('prov_id')->nullable();
        });
        Schema::table('costumer_produkt_grundversicherung', function (Blueprint $table) {
            $table->integer('prov_id')->nullable();
        });
        Schema::table('costumer_produkt_rechtsschutz', function (Blueprint $table) {
            $table->integer('prov_id')->nullable();
        });
        Schema::table('costumer_produkt_hausrat', function (Blueprint $table) {
            $table->integer('prov_id')->nullable();
        });
        Schema::table('costumer_produkt_vorsorge', function (Blueprint $table) {
            $table->integer('prov_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('costumer_podukt_zusatzversicherung', function (Blueprint $table) {
            
        });
    }
}
