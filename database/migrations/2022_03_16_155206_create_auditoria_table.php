<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAuditoriaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('auditoria', function (Blueprint $table) {
            $table->bigInteger('id', true);
            $table->uuid('user_id');
            $table->string('tipo_evento');
            $table->string('nome_tabela');
            $table->text('valor_anterior')->nullable();
            $table->text('valor_novo')->nullable();
            $table->text('url')->nullable();
            $table->string('ip_andress')->nullable();
            $table->string('user_agent')->nullable();
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
        Schema::dropIfExists('auditoria');
    }
}
