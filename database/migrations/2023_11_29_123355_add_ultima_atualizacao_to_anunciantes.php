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
            $table->dateTime('ultima_atualizacao')->nullable()->after('logo');
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
            $table->dropColumn('ultima_atualizacao');
        });
    }
};
