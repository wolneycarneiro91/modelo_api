<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGrupoTabelaTabelaGenericaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grupo_tabela_tabela_generica', function (Blueprint $table) {
            $table->bigInteger('id')->primary();
            $table->bigInteger('id_grupo_tabela');
            $table->bigInteger('id_tabela_generica');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('grupo_tabela_tabela_generica');
    }
}
