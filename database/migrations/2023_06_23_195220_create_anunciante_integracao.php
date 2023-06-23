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
        Schema::create('anunciante_integracao', function (Blueprint $table) {
            $table->id();
            $table->foreignId('anunciante_id')->constrained('anunciantes');
            $table->foreignId('integracao_id')->constrained('integracoes');
            $table->string('arquivo', 255);
            $table->string('url', 255);
            $table->enum('tipo', ['Ativa', 'Bloqueada'])->default('Ativa');
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
        Schema::dropIfExists('anunciante_integracao');
    }
};
