<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TableCostumerProduktGrundversicherung extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('costumer_produkt_grundversicherung',function (Blueprint $table){
            $table->id();
            $table->integer('person_id_PG')->nullable();
            $table->date('graduation_date_PG')->nullable();
            $table->string('society_PG')->nullable();
            $table->string('product_PG')->nullable();
            $table->string('status_PG')->nullable();
            $table->date('last_adjustment_PG')->nullable();
            $table->string('total_commisions_PG')->default(0);
            $table->integer('selected')->default(0);
            $table->string('stoiner_PG')->nullable();
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
        Schema::dropIfExists('costumer_produkt_grundversicherung');
    }
}
