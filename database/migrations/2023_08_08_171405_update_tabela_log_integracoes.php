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
        Schema::table('log_integracoes', function (Blueprint $table) {
            $table->dropColumn('tipo');
            $table->dropColumn('id_externo');
            $table->dropColumn('titulo');
            $table->dropColumn('descricao_log');
            $table->integer('total_incluidos')->nullable()->after('id');
            $table->integer('total_alterados')->nullable()->after('id');
            $table->integer('total_removidos')->nullable()->after('id');
            $table->integer('total_alertas')->nullable()->after('id');
            $table->foreignId('anunciante_id')->constrained('anunciantes')->after('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

    }
};
