<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVacantesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vacantes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('categoria_id');
            $table->foreign('categoria_id')->references('id')->on('categorias')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('experiencia_id');
            $table->foreign('experiencia_id')->references('id')->on('experiencias')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('ubicacion_id');
            $table->foreign('ubicacion_id')->references('id')->on('ubicacions')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('salario_id');
            $table->foreign('salario_id')->references('id')->on('salaries')->onUpdate('cascade')->onDelete('cascade');
            $table->string('titulo');
            $table->string('imagen');
            $table->boolean('activa')->default(true);
            $table->text('descripcion');
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
        Schema::dropIfExists('vacantes');
    }
}
