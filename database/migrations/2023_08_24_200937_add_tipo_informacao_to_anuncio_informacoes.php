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
        Schema::table('anuncio_informacoes', function (Blueprint $table) {
            $table->enum('tipo', ['Detalhes', 'Características', 'Lazer'])->default('Detalhes')->after('chave');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('anuncio_informacoes', function (Blueprint $table) {
            $table->dropColumn('tipo');
        });
    }
};
