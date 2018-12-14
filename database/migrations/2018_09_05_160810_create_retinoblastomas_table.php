<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRetinoblastomasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('retinoblastomas', function (Blueprint $table) {
            $table->increments('id');
            $table->date('fecha')->nullable();
            $table->integer('retraso')->nullable();
            $table->string('retinood',20)->nullable();
            $table->string('retinooi',20)->nullable();
            $table->string('germinal',20)->nullable();
            $table->string('esporadico',20)->nullable();
            $table->date('enucleod',20)->nullable();
            $table->date('enucleoi',20)->nullable();
            $table->string('bxod',20)->nullable();
            $table->date('fechabxod')->nullable();
            $table->string('bxoi',20)->nullable();
            $table->date('fechabxoi')->nullable();
            $table->string('ciclo1',20)->nullable();
            $table->string('ciclo2',20)->nullable();
            $table->string('ciclo3',20)->nullable();
            $table->string('ciclo4',20)->nullable();
            $table->string('ciclo5',20)->nullable();
            $table->string('ciclo6',20)->nullable();
            $table->string('ciclo_otro',300)->nullable();
            $table->string('medic1',20)->nullable();
            $table->string('medic2',20)->nullable();
            $table->string('medic3',20)->nullable();
            $table->string('medic4',20)->nullable();
            $table->string('medic5',20)->nullable();
            $table->string('medic6',20)->nullable();
            $table->string('medicotros',20)->nullable();
            $table->string('radio',300)->nullable();
            $table->string('lugar',300)->nullable();
            $table->string('dosisod',300)->nullable();
            $table->string('dosisoi',300)->nullable();
            $table->integer('historia_id')->unsigned();
            $table->foreign('historia_id')->references('id')->on('h__oncols');
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
        Schema::dropIfExists('retinoblastomas');
    }
}
