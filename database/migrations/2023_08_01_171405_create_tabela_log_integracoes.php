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
        Schema::create('log_integracoes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('anunciante_id')->constrained('anunciantes');
            $table->integer('total_incluidos')->nullable();
            $table->integer('total_alterados')->nullable();
            $table->integer('total_removidos')->nullable();
            $table->integer('total_alertas')->nullable();
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

    }
};
