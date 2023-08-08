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
        Schema::table('anunciante_integracao', function (Blueprint $table) {
            $table->integer('periodicidade_atualizacao')->after('url')->default(24);
            $table->enum('notificar', ['Sim', 'Não'])->after('url')->default('Sim');
            $table->dropColumn('tipo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('anunciante_integracao', function (Blueprint $table) {
            //
        });
    }
};
