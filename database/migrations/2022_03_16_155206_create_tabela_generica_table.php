<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTabelaGenericaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tabela_generica', function (Blueprint $table) {
            $table->bigInteger('id')->primary();
            $table->string('cd_tabela_generica', 6);
            $table->string('nm_tabela_generica', 100);
            $table->string('ds_tabela_generica', 300);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tabela_generica');
    }
}
