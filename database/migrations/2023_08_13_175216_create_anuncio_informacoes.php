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
        Schema::create('anuncio_informacoes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('anuncio_id')->constrained('anuncios')->after('id');
            $table->string('chave', 20)->index();
            $table->string('valor', 255);
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
        Schema::dropIfExists('anuncio_informacoes');
    }
};
