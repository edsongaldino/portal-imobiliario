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
        Schema::table('anuncios', function (Blueprint $table) {
            $table->dropForeign('finalidade_id');
            $table->dropColumn('finalidade_id');
            $table->enum('finalidade', ['Comercial', 'Residencial', 'Comercial/Residencial'])->default('Residencial')->after('transacao');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('anuncios', function (Blueprint $table) {
            $table->dropColumn('finalidade');
        });
    }
};
