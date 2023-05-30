<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSkillVacanteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('skill_vacante', function (Blueprint $table) {
            /**
             * La migracion se crea con el mismo comando create_name_table para una tabla pivote.
             * De acuerdo con Laravel, el nombre de la tabla pivote debe ser el nombre de la tabla A,
             * guion,nombre de la tabla b en orden de las letras del abecedario por ejemplo:
             * create_skill_vacante_table
             */
            $table->unsignedBigInteger('skill_id');
            $table->foreign('skill_id')->references('id')->on('skills')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('vacante_id');
            $table->foreign('vacante_id')->references('id')->on('vacantes')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('skill_vacante');
    }
}
