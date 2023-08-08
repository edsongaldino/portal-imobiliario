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
        Schema::create('log_integracao_anuncios', function (Blueprint $table) {
            $table->id();
            $table->foreignId('log_integracao_id')->constrained('log_integracoes');
            $table->enum('tipo', ['Sucesso', 'Erro', 'Alerta']);
            $table->enum('subtipo', ['Inclusão', 'Atualização', 'Exclusão']);
            $table->string('id_externo', 20);
            $table->string('titulo', 100);
            $table->longText('descricao_log');
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
        Schema::dropIfExists('log_integracao_anuncios');
    }
};
