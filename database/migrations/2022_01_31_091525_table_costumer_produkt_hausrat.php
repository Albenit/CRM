<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TableCostumerProduktHausrat extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('costumer_produkt_hausrat',function (Blueprint $table){
            $table->id();
            $table->integer('person_id_PH')->nullable();
            $table->string('society_PH')->nullable();
            $table->date('beginning_insurance_PH')->nullable();
            $table->string('insurance_PH')->nullable();
            $table->string('status_PH')->nullable();
            $table->date('last_adjustment_PH')->nullable();
            $table->string('total_commisions_PH')->default(0);
            $table->integer('selected')->default(0);
            $table->string('stoiner_PH')->nullable();
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
        Schema::dropIfExists('costumer_produkt_hausrat');
    }
}
