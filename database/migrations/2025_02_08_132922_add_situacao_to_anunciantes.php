<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('anunciantes', function (Blueprint $table) {
            $table->enum('situacao_cadastro', ['Ativo', 'Aguardando', 'Bloqueado'])->default('Aguardando')->after('ultima_atualizacao');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('anunciantes', function (Blueprint $table) {
            $table->dropColumn('situacao_cadastro');
        });
    }
};
