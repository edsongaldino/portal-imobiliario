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
        Schema::table('anunciantes', function (Blueprint $table) {
            $table->string('email', 150)->after('inscricao_municipal');
            $table->string('telefone_comercial', 15)->after('inscricao_municipal');
            $table->string('whatsapp', 15)->after('inscricao_municipal');
            $table->string('site', 255)->after('inscricao_municipal');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('anunciantes', function (Blueprint $table) {
            $table->dropColumn('email');
            $table->dropColumn('telefone_comercial');
            $table->dropColumn('whatsapp');
            $table->dropColumn('site');
        });
    }
};
