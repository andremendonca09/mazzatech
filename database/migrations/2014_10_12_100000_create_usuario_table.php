<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsuarioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuario', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome');
            $table->string('login',50)->unique();
            $table->string('senha',255);
            $table->unsignedInteger('situacao_usuario_id');
            $table->timestamps();
            $table->foreign('situacao_usuario_id')->references('id')->on('situacao_usuario');
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
        Schema::dropIfExists('usuario');
    }
}
