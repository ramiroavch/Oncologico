<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePacientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::enableForeignKeyConstraints();
        Schema::create('pacientes', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('ci')->nullable();
            $table->string('nombre1');
            $table->string('nombre2')->nullable();
            $table->string('apellido1');
            $table->string('apellido2')->nullable();
            $table->mediumInteger('tlf')->nullable();
            $table->date('fecha_nac');
            $table->string('procedencia')->nullable();
            $table->string('referencia')->nullable();
            $table->string('Lic')->nullable();
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
        Schema::dropIfExists('pacientes');
    }
}
