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
            $table->string('telefone_comercial')->nullable()->after('email');
            $table->string('whatsapp_comercial')->nullable()->after('email');
            $table->string('email_comercial')->nullable()->after('email');
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
            //
        });
    }
};
