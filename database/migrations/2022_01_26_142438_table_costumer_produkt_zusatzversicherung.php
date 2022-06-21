<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TableCostumerProduktZusatzversicherung extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('costumer_podukt_zusatzversicherung',function (Blueprint $table){
            $table->id();
            $table->integer('person_id_PZ')->nullable();
            $table->date('graduation_date_PZ')->nullable();
            $table->string('society_PZ')->nullable();
            $table->string('produkt_PZ')->nullable();
            $table->string('vvg_premium_PZ')->nullable();
            $table->date('duration_from_PZ')->nullable();
            $table->date('duration_to_PZ')->nullable();
            $table->string('status_PZ')->nullable();
            $table->date('last_adjustment_PZ')->nullable()->useCurrent();
            $table->string('provision_PZ')->nullable();

            $table->string('produkt_PZ2')->nullable();
            $table->string('vvg_premium_PZ2')->nullable();
            $table->date('duration_from_PZ2')->nullable();
            $table->date('duration_to_PZ2')->nullable();
            $table->string('status_PZ2')->nullable();
            $table->date('last_adjustment_PZ2')->nullable();
            $table->string('provision_PZ2')->nullable();

            $table->string('total_commisions_PZ')->default(0);
            $table->integer('selected')->default(0);
            $table->string('stoiner_PZ')->nullable();
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
        Schema::dropIfExists('costumer_podukt_zusatzversicherung');
    }
}
