<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anunciante extends Model
{
    use HasFactory;
    protected $table = 'anunciantes';

    public function endereco()
    {
        return $this->hasOne(Endereco::class, 'id', 'endereco_id');
    }

    public function verificaDuplicidade($campo, $valor){

        $dup = $this::where($campo, $valor)->first();

        if(isset($dup)){
            return $dup;
        }else{
            return false;
        }
    }

    public function anuncios()
   	{
   		return $this->hasMany('App\Models\Anuncio', 'anunciante_id');
   	}

    public function integracao()
    {
        return $this->hasMany(AnuncianteIntegracao::class, 'anunciante_id', 'id');
    }
}
