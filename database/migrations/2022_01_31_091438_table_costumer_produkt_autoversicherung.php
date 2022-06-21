<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TableCostumerProduktAutoversicherung extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('costumer_produkt_autoversicherung',function (Blueprint $table){
            $table->id();
            $table->integer('person_id_PA')->nullable();
            $table->string('society_PA')->nullable();
            $table->date('beginning_insurance_PA')->nullable();
            $table->string('insurance_PA')->nullable();
            $table->string('status_PA')->nullable();
            $table->date('last_adjustment_PA')->nullable();
            $table->string('total_commisions_PA')->default(0);
            $table->integer('selected')->default(0);
            $table->string('stoiner_PA')->nullable();
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
        Schema::dropIfExists('costumer_produkt_autoversicherung');
    }
}
