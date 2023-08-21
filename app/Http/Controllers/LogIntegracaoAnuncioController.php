<?php

namespace App\Http\Controllers;

use App\Models\LogIntegracaoAnuncio;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LogIntegracaoAnuncioController extends Controller
{
    public function gravaLogAnuncio($log_integracao_id,$anuncio_id, $tipo_log, $subtipo_log, $titulo, $descricao_log){

        $logIntegracaoAnuncio = new LogIntegracaoAnuncio();
        $logIntegracaoAnuncio->log_integracao_id = $log_integracao_id;
        $logIntegracaoAnuncio->tipo = $tipo_log;
        $logIntegracaoAnuncio->subtipo = $subtipo_log;
        $logIntegracaoAnuncio->id_externo = $anuncio_id;
        $logIntegracaoAnuncio->titulo = $titulo;
        $logIntegracaoAnuncio->descricao_log = $descricao_log;

        if($logIntegracaoAnuncio->save()){
            return $logIntegracaoAnuncio;
        }else{
            dd($logIntegracaoAnuncio);
        }

    }
}
