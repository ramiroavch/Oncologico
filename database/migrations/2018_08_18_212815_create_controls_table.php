<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateControlsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('controls', function (Blueprint $table) {
            $table->increments('id');
            $table->string('num_control');
            $table->date('fecha');
            $table->string('avod',10)->nullable();
            $table->string('avid',10)->nullable();
            $table->string('anexod',10)->nullable();
            $table->string('anexid',10)->nullable();
            $table->string('biood',300)->nullable();
            $table->string('biooi',300)->nullable();
            $table->string('balmus',300)->nullable();
            $table->string('piood',10)->nullable();
            $table->string('piooi',10)->nullable();
            $table->string('fonojo',300)->nullable();
            $table->string('diag',300)->nullable();
            $table->string('plan',500)->nullable();
            $table->integer('historia_id')->unsigned()->nullable();
            $table->foreign('historia_id')->references('id')->on('h__oncols');
            $table->integer('historiano_id')->unsigned()->nullable();
            $table->foreign('historiano_id')->references('id')->on('h__no__oncols');
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
        Schema::dropIfExists('controls');
    }
}
