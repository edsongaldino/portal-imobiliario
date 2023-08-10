<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anuncio extends Model
{
    use HasFactory;
    protected $table = 'anuncios';

    public function endereco()
    {
        return $this->hasOne(Endereco::class, 'id', 'endereco_id');
    }

    public function anunciante()
    {
        return $this->hasOne(Anunciante::class, 'id', 'anunciante_id');
    }

    public function verificaDuplicidade($campo, $valor){

        $dup = $this::where($campo, $valor)->first();

        if(isset($dup)){
            return $dup;
        }else{
            return false;
        }
    }

    public function fotos()
    {
        return $this->hasMany(AnuncioFotos::class, 'anuncio_id', 'id');
    }
}
