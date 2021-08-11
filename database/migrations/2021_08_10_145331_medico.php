<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Medico extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medico', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome');
            $table->string('crm',50)->unique();
            $table->unsignedInteger('situacao_medico_id');
            $table->unsignedInteger('usuario_id');
            $table->timestamps();
            $table->foreign('situacao_medico_id')->references('id')->on('situacao_medico');
            $table->foreign('usuario_id')->references('id')->on('usuario');
        });
        // Schema::table('posts', function (Blueprint $table) {
        //     $table->foreignId('user_id')->constrained('users');
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('medico');
    }
}
