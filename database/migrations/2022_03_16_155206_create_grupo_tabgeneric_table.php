<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGrupoTabgenericTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grupo_tabgeneric', function (Blueprint $table) {
            $table->string('ds_grupo_tabgeneric', 300);
            $table->bigInteger('id')->primary();
            $table->string('nm_grupo_tabgeneric', 50);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('grupo_tabgeneric');
    }
}
