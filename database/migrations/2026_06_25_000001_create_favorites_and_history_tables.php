<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // 1. Seed Perfil 'Cliente' if not exists
        $hasPerfil4 = DB::table('perfis')->where('id', 4)->exists();
        if (!$hasPerfil4) {
            DB::table('perfis')->insert([
                'id' => 4,
                'nome' => 'Cliente',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        // 2. Favorites Table
        Schema::create('favoritos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('anuncio_id')->constrained('anuncios')->onDelete('cascade');
            $table->timestamps();
            $table->unique(['user_id', 'anuncio_id']);
        });

        // 3. Navigation History Table
        Schema::create('historico_navegacao', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('anuncio_id')->constrained('anuncios')->onDelete('cascade');
            $table->timestamps();
            $table->unique(['user_id', 'anuncio_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('historico_navegacao');
        Schema::dropIfExists('favoritos');
    }
};
