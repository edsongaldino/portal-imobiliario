<?php

namespace App\Http\Controllers;

use App\Models\LogIntegracao;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LogIntegracaoController extends Controller
{
    public function gravaLog($anuncio_id, $tipo_log, $titulo, $descricao_log){

        $logIntegracao = new LogIntegracao();
        $logIntegracao->tipo = $tipo_log;
        $logIntegracao->id_externo = $anuncio_id;
        $logIntegracao->titulo = $titulo;
        $logIntegracao->descricao_log = $descricao_log;
        $logIntegracao->save();

        return $logIntegracao;
    }
}
