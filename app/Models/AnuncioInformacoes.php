<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnuncioInformacoes extends Model
{
    use HasFactory;
    protected $table = 'anuncio_informacoes';

    public function GravaInformacao($anuncio_id, $chave, $valor){

        $endereco = new AnuncioInformacoes();
        $endereco->cidade_id = $request->cidade_endereco;
        $endereco->cep_endereco = $request->cep_endereco;
        $endereco->bairro_endereco = $request->bairro_endereco;
        $endereco->save();

        return $endereco;
    }
}
