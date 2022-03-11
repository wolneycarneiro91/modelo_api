<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('salas', function (Blueprint $table) {
            $table->id();
            $table->integer('tipo_aluno_id');
            $table->integer('tipo_escola_id');
            $table->integer('quantidade_alunos');
            $table->foreign('tipo_aluno_id')->references('id')->on('tipo_de_alunos');
            $table->foreign('tipo_escola_id')->references('id')->on('tipo_de_escolas');
            $table->softDeletes();
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
        Schema::dropIfExists('salas');
    }
};
