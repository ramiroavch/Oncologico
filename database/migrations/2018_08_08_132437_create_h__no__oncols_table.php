<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHNoOncolsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('h__no__oncols', function (Blueprint $table) {
            $table->increments('id');
            $table->string('num_h',40);
            $table->date('fecha');
            $table->string('enfer_actual',255)->nullable();
            $table->string('antec_madre',255)->nullable();
            $table->string('antec_padre',255)->nullable();
            $table->string('antec_otros',255)->nullable();
            $table->string('antec_person',255)->nullable();
            $table->string('antec_oftal',255)->nullable();
            $table->string('antec_quirur',255)->nullable();
            $table->integer('N_emb')->nullable();
            $table->smallInteger('emb_cont')->nullable();
            $table->smallInteger('emb_cesar')->nullable();
            $table->string('peso_nac',5)->nullable();
            $table->string('talla_nac',5)->nullable();
            $table->string('semanas',5)->nullable();
            $table->string('comp_nac',255)->nullable();
            $table->string('comp_mat',255)->nullable();
            $table->string('diagnos_descrip',255)->nullable();
            $table->string('avsc_od',20)->nullable();
            $table->string('avsc_oi',20)->nullable();
            $table->string('avmc_od',20)->nullable();
            $table->string('avmc_oi',20)->nullable();
            $table->string('refracc',255)->nullable();
            $table->string('anex_od',20)->nullable();
            $table->string('anex_oi',20)->nullable();
            $table->string('bio_od',255)->nullable();
            $table->string('bio_oi',255)->nullable();
            $table->string('presion_od',255)->nullable();
            $table->string('presion_oi',255)->nullable();
            $table->string('bal_musc',255)->nullable();
            $table->string('diagnostico',255)->nullable();
            $table->string('plan',255)->nullable();
            $table->string('fondo_od')->nullable();
            $table->string('fondo_oi')->nullable();
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
        Schema::dropIfExists('h__no__oncols');
    }
}
