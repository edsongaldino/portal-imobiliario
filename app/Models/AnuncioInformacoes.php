<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnuncioInformacoes extends Model
{
    use HasFactory;
    protected $table = 'anuncio_informacoes';

    public function GravaInformacao($anuncio_id, $chave, $valor){

        $anuncioInfo = new AnuncioInformacoes();
        $anuncioInfo->anuncio_id = $anuncio_id;
        $anuncioInfo->chave = $chave;
        $anuncioInfo->valor = $valor;
        $anuncioInfo->save();

        return $anuncioInfo;
    }

    public function UpdateInformacao($anuncio_id, $chave, $valor){

        $anuncioInfoUpdate = AnuncioInformacoes::where('anuncio_id', $anuncio_id)->where('chave', $chave);

        if($anuncioInfoUpdate->get()->count() > 0){
            $dadosAnuncio = $anuncioInfoUpdate->update(['valor' => $valor]);
        }else{
            $dadosAnuncio = $this->GravaInformacao($anuncio_id, $chave, $valor);
        }

        return $dadosAnuncio;
    }


    public function DeletaInformacao($anuncio_id, $chave){
        $anuncioInformacao = AnuncioInformacoes::where('anuncio_id', $anuncio_id)->where('chave', $chave)->get();
        if($anuncioInformacao->count() > 0){
            if($anuncioInformacao->delete()){
                return true;
            }
        }
        return false;
    }

}
