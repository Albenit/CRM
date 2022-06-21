<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TableCostumerProduktRechtsschutz extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('costumer_produkt_rechtsschutz',function (Blueprint $table){
            $table->id();
            $table->integer('person_id_PR')->nullable();
            $table->date('graduation_date_PR')->nullable();
            $table->string('society_PR')->nullable();
            $table->string('produkt_PR')->nullable();
            $table->string('status_PR')->nullable();
            $table->date('last_adjustment_PR')->nullable();
            $table->string('total_commisions_PR')->nullable();
            $table->integer('selected')->default(0);
            $table->string('stoiner_PR')->nullable();
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
