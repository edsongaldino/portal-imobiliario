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
        Schema::create('empreendimento_caracteristica', function (Blueprint $table) {
            $table->id();
            $table->foreignId('empreendimento_id')->constrained('empreendimentos');
            $table->foreignId('caracteristica_id')->constrained('caracteristicas');
            $table->string('valor', 50);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('empreendimento_caracteristica');
    }
};
