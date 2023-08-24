<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnuncioInformacoes extends Model
{
    use HasFactory;
    protected $table = 'anuncio_informacoes';

    public function GravaInformacao($anuncio_id, $chave, $tipo, $valor){

        $anuncioInfo = new AnuncioInformacoes();
        $anuncioInfo->anuncio_id = $anuncio_id;
        $anuncioInfo->chave = $chave;
        $anuncioInfo->tipo = $tipo;
        $anuncioInfo->valor = $valor;
        $anuncioInfo->save();

        return $anuncioInfo;
    }

    public function UpdateInformacao($anuncio_id, $chave, $tipo, $valor){

        $anuncioInfoUpdate = AnuncioInformacoes::where('anuncio_id', $anuncio_id)->where('chave', $chave);

        if($anuncioInfoUpdate->get()->count() > 0){
            $dadosAnuncio = $anuncioInfoUpdate->update(['valor' => $valor]);
        }else{
            $dadosAnuncio = $this->GravaInformacao($anuncio_id, $chave, $tipo, $valor);
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


    public function GetInformacaoByChave($anuncio_id, $chave){
        $anuncioInformacao = AnuncioInformacoes::where('anuncio_id', $anuncio_id)->where('chave', $chave)->get();
        if($anuncioInformacao){
            return $anuncioInformacao->valor;
        }else{
            return false;
        }

    }

    public function GetInformacoesByTipo($anuncio_id, $tipo){
        $anuncioInformacoes = AnuncioInformacoes::where('anuncio_id', $anuncio_id)->where('tipo', $tipo)->get();
        if($anuncioInformacoes){
            return $anuncioInformacoes;
        }else{
            return false;
        }

    }


}
