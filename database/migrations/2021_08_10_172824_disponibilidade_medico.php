<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DisponibilidadeMedico extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('disponibilidade_medico', function (Blueprint $table) {
            $table->integer('dia_semana');
            $table->time('horario');
            $table->unsignedInteger('medico_id');
            $table->unsignedInteger('usuario_id');
            $table->timestamps();
            $table->foreign('usuario_id')->references('id')->on('usuario');
            $table->foreign('medico_id')->references('id')->on('medico');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('disponibilidade_medico');
    }
}
