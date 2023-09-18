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

    public function tipo()
    {
        return $this->hasOne(AnuncioTipo::class, 'id', 'tipo_id');
    }

    public function verificaDuplicidade($campo, $valor, $anunciante){

        $dup = $this::where($campo, $valor)->where('anunciante_id', $anunciante)->first();

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

    public function leads()
    {
        return $this->hasMany(Leads::class, 'anuncio_id', 'id');
    }

    public function informacoes()
    {
        return $this->hasMany(AnuncioInformacoes::class, 'anuncio_id', 'id');
    }
}
