<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Anunciante;
use App\Models\Anuncio;
use App\Models\AnuncioTipo;
use App\Models\Cidade;
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
        $anunciantes = Anunciante::all();
        $destaques = Anuncio::where('situacao', 'Liberado')->orderByRaw('RAND()')->limit(12)->get();
        $cidades = Cidade::select('cidades.*')->where('anuncios.situacao', 'Liberado')
                            ->join('enderecos', 'enderecos.cidade_id', '=', 'cidades.id')
                            ->join('anuncios', 'anuncios.endereco_id', '=', 'enderecos.id')
                            ->GroupBy('cidades.id')->get();
        return view('portal.index', compact('tipos', 'destaques', 'cidades', 'anunciantes'));
    }
}
