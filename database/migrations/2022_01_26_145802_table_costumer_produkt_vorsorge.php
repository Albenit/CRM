<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TableCostumerProduktVorsorge extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('costumer_produkt_vorsorge',function (Blueprint $table){
            $table->id();
            $table->integer('person_id_PV')->nullable();
            $table->date('graduation_date_PV')->nullable();
            $table->date('begin_PV')->nullable();
            $table->string('society_PV')->nullable();
            $table->string('pramie_PV')->nullable();
            $table->string('payment_rythm_PV')->nullable();
            $table->date('duration_from_PV')->nullable();
            $table->date('duration_to_PV')->nullable();
            $table->string('production_PV')->nullable();
            $table->string('status_PV')->nullable();
            $table->date('last_adjustment_PV')->nullable();
            $table->string('total_commisions_PV')->default(0);
            $table->integer('selected')->default(0);
            $table->string('stoiner_PV')->nullable();
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
        //
    }
}
