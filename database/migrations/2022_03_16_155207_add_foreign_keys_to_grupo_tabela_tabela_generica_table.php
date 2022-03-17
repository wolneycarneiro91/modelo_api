<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToGrupoTabelaTabelaGenericaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('grupo_tabela_tabela_generica', function (Blueprint $table) {
            $table->foreign(['id'], 'grupo_tabela_tabela_generica_fk')->references(['id'])->on('grupo_tabgeneric')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign(['id'], 'grupo_tabela_tabela_generica_fk2')->references(['id'])->on('tabela_generica')->onUpdate('RESTRICT')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('grupo_tabela_tabela_generica', function (Blueprint $table) {
            $table->dropForeign('grupo_tabela_tabela_generica_fk');
            $table->dropForeign('grupo_tabela_tabela_generica_fk2');
        });
    }
}
