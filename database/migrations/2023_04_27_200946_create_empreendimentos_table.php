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
        Schema::create('empreendimentos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('finalidade_id')->constrained('finalidades');
            $table->foreignId('tipo_id')->constrained('tipos');
            $table->foreignId('imobiliaria_id')->constrained('imobiliarias');
            $table->foreignId('endereco_id')->constrained('enderecos');
            $table->enum('transacao', ['Locação', 'Venda', 'Locação/Venda']);
            $table->string('titulo', 100);
            $table->longText('descricao');
            $table->decimal('valor_venda', 10,2)->nullable();
            $table->decimal('valor_locacao', 10,2)->nullable();
            $table->decimal('valor_condominio', 10,2)->nullable();
            $table->enum('situacao', ['Liberado', 'Bloqueado']);
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
        Schema::dropIfExists('empreendimentos');
    }
};
