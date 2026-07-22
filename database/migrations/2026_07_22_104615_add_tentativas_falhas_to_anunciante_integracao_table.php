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
            $table->integer('tentativas_falhas')->default(0)->after('bloqueado');
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
            $table->dropColumn('tentativas_falhas');
        });
    }
};
