<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\AnuncioTipo;
use App\Models\LogIntegracao;
use App\Models\LogIntegracaoAnuncio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AppController extends Controller
{
    public function login(){
        return view('painel.login');
    }

    public function index(){
        $usuario = Auth::user();
        $logintegracao = LogIntegracao::where('anunciante_id', $usuario->anunciante_id)->first();
        if($logintegracao){
            $loganuncios = LogIntegracaoAnuncio::where('log_integracao_id',$logintegracao->id)->take(5)->get();
        }else{
            $loganuncios = null;
        }

        return view('painel.dashboard', compact('usuario','loganuncios'));
    }

    public function PaginaInicial(){
        $tipos = AnuncioTipo::all();
        return view('portal.index', compact('tipos'));
    }
}
