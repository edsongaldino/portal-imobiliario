<?php

namespace App\Http\Controllers;

use App\Models\LogIntegracao;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LogIntegracaoController extends Controller
{
    public function gravaLog($anunciante_id, $total_alertas, $total_incluidos, $total_alterados, $total_removidos){

        $logIntegracao = new LogIntegracao();
        $logIntegracao->anunciante_id = $anunciante_id;
        $logIntegracao->total_alertas = $total_alertas;
        $logIntegracao->total_removidos = $total_removidos;
        $logIntegracao->total_alterados = $total_alterados;
        $logIntegracao->total_incluidos = $total_incluidos;
        $logIntegracao->save();

        return $logIntegracao;
    }

    public function updateLog($log_id, $total_alertas, $total_incluidos, $total_alterados, $total_removidos){

        $logIntegracao = LogIntegracao::findOrFail($log_id);
        $logIntegracao->total_alertas = $total_alertas;
        $logIntegracao->total_removidos = $total_removidos;
        $logIntegracao->total_alterados = $total_alterados;
        $logIntegracao->total_incluidos = $total_incluidos;
        $logIntegracao->save();

        return $logIntegracao;
    }
}
