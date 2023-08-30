<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnuncioFotos extends Model
{
    use HasFactory;
    protected $table = 'fotos';

    public function DeletaFotos($anuncio_id){
        $fotos_anuncio = AnuncioFotos::where('anuncio_id', $anuncio_id)->get();
        if($fotos_anuncio->count() > 0){
            if($fotos_anuncio->delete()){
                return true;
            }
        }
        return false;
    }
}
