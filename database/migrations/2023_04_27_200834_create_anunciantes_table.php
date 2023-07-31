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
        Schema::create('anunciantes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('endereco_id')->constrained('enderecos');
            $table->enum('tipo_anunciante', ['Imobiliária', 'Corretor', 'Construtora']);
            $table->string('nome', 100);
            $table->longText('descricao')->nullable();
            $table->string('creci', 10);
            $table->string('cnpj', 14);
            $table->string('razao_social', 100)->nullable();
            $table->string('nome_fantasia', 100)->nullable();
            $table->string('inscricao_estadual', 20)->nullable();
            $table->string('inscricao_municipal', 20)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('anunciantes');
    }
};
