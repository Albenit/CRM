<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CostumersTableMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    Schema::create('costumers',function(Blueprint $table){
        $table->id();
        $table->string('name')->index();
        $table->string('surname')->index();
        $table->string('email')->index();
        $table->string('dateofbirth')->index();
        $table->string('phone')->index();
        $table->integer('admin_id')->nullable(); // soon to be a foreign key related with admins table
        $table->boolean('mandated')->nullable();
        $table->json('actions');
        $table->date('birthday')->nullable();
        $table->integer('age')->nullable();
        $table->string('nationality')->nullable();
        $table->string('civilstatus')->nullable();
        $table->string('kvg');
        $table->string('vvg');
        $table->string('health')->index();
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
