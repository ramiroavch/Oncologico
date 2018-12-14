<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHOncolsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::enableForeignKeyConstraints();
        Schema::create('h__oncols', function (Blueprint $table) {
            $table->increments('id');
            $table->string('num_h',40);
            $table->date('fecha');
            $table->integer('leucoria_edad')->nullable();
            $table->string('leu_od')->nullable();
            $table->string('leu_oi')->nullable();
            $table->integer('estrabismo_edad')->nullable();
            $table->string('estra_od')->nullable();
            $table->string('estra_oi')->nullable();
            $table->string('estra_et')->nullable();
            $table->string('estra_xt')->nullable();
            $table->string('estra_ht')->nullable();
            $table->integer('celulitis_edad')->nullable();
            $table->string('cel_od')->nullable();
            $table->string('cel_oi')->nullable();
            $table->string('otro',255)->nullable();
            $table->string('lugar_sign',255)->nullable();
            $table->string('desc_sign',255)->nullable();
            $table->string('trat_sign',255)->nullable();
            $table->string('antec_madre',255)->nullable();
            $table->string('antec_padre',255)->nullable();
            $table->string('antec_hermanos',255)->nullable();
            $table->integer('N_emb')->nullable();
            $table->smallInteger('emb_cont')->nullable();
            $table->smallInteger('emb_cesar')->nullable();
            $table->string('peso_nac',5)->nullable();
            $table->string('talla_nac',5)->nullable();
            $table->smallInteger('nac_comp');
            $table->string('antec_med',255)->nullable();
            $table->string('antec_quirur',255)->nullable();
            $table->string('av_od',20)->nullable();
            $table->string('av_oi',20)->nullable();
            $table->string('anex_od',255)->nullable();
            $table->string('anex_oi',255)->nullable();
            $table->string('bio_od',255)->nullable();
            $table->string('bio_oi',255)->nullable();
            $table->string('bal_musc',255)->nullable();
            $table->string('pio_od',20)->nullable();
            $table->string('pio_oi',20)->nullable();
            $table->string('fondo_ojo')->nullable();
            $table->string('diagnostico',255)->nullable();
            $table->string('plan',255)->nullable();
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
        Schema::dropIfExists('h__oncols');
    }
}
