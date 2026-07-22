<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Anunciante;
use App\Models\Anuncio;
use App\Models\AnuncioTipo;
use App\Models\Cidade;
use App\Models\LogIntegracao;
use App\Models\LogIntegracaoAnuncio;
use App\Models\Indicativo;
use App\Helpers\Helper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AppController extends Controller
{
    public function login(){
        return view('painel.login');
    }

    public function loginPortal(){
        return view('portal.login');
    }

    public function index(){
        $usuario = Auth::user();
        if ($usuario->perfil_id == 4) {
            return redirect()->route('imoveis-favoritos');
        }

        // Admin global stats
        if ($usuario->perfil_id == 1) {
            $totalAnuncios = Anuncio::where('situacao', 'Liberado')->count();
            $totalViews = \App\Models\RelatorioAnuncio::where('tipo', '<>', 'Lead')->count();
            $totalLeads = \App\Models\Leads::whereNull('deleted_at')->count();
            $totalParceiros = Anunciante::whereNull('deleted_at')->count();
            $parceirosAtivos = Anunciante::whereNull('deleted_at')->where('situacao_cadastro', 'Ativo')->count();
            $parceirosAguardando = Anunciante::whereNull('deleted_at')->where('situacao_cadastro', 'Aguardando')->count();
            $parceirosBloqueados = Anunciante::whereNull('deleted_at')->where('situacao_cadastro', 'Bloqueado')->count();

            // Últimas integrações gerais
            $ultimasIntegracoes = LogIntegracao::with('anunciante')
                ->orderBy('created_at', 'desc')
                ->take(10)
                ->get();

            // Últimos leads gerais
            $ultimosLeads = \App\Models\Leads::whereNull('leads.deleted_at')
                ->join('anuncios', 'anuncios.id', '=', 'leads.anuncio_id')
                ->join('anunciantes', 'anunciantes.id', '=', 'anuncios.anunciante_id')
                ->select('leads.*', 'anunciantes.nome as anunciante_nome')
                ->orderBy('leads.created_at', 'desc')
                ->take(10)
                ->get();

            return view('painel.dashboard', compact(
                'usuario', 'totalAnuncios', 'totalViews', 'totalLeads',
                'totalParceiros', 'parceirosAtivos', 'parceirosAguardando', 'parceirosBloqueados',
                'ultimasIntegracoes', 'ultimosLeads'
            ));
        }

        // Regular advertiser
        $anuncianteId = $usuario->anunciante_id ?? ($usuario->anunciante->id ?? null);
        
        $totalAnunciosAdv = 0;
        $totalViewsAdv = 0;
        $totalLeadsAdv = 0;
        $totalFavoritosAdv = \App\Models\Favorito::where('user_id', $usuario->id)->count();
        
        $anunciosLiberados = 0;
        $anunciosEmAnalise = 0;
        $anunciosRejeitados = 0;
        $anunciosExpirados = 0;
        
        $anunciosMaisVisualizados = collect();
        $leadsRecentes = collect();

        if ($anuncianteId) {
            $totalAnunciosAdv = Anuncio::where('anunciante_id', $anuncianteId)->count();
            $totalViewsAdv = Helper::GetTotalViewsByAnunciante($anuncianteId);
            $totalLeadsAdv = Helper::GetTotalLeadsAnunciante($anuncianteId);

            $anunciosLiberados = Anuncio::where('anunciante_id', $anuncianteId)->where(function($q) { $q->where('situacao', 'Liberado')->orWhere('situacao', 'Ativo')->orWhereNull('situacao'); })->count();
            $anunciosEmAnalise = Anuncio::where('anunciante_id', $anuncianteId)->where('situacao', 'Aguardando')->count();
            $anunciosRejeitados = Anuncio::where('anunciante_id', $anuncianteId)->where('situacao', 'Bloqueado')->count();
            $anunciosExpirados = Anuncio::where('anunciante_id', $anuncianteId)->where('situacao', 'Expirado')->count();

            $anunciosMaisVisualizados = Anuncio::where('anunciante_id', $anuncianteId)
                ->with(['fotos', 'tipo', 'endereco.cidade'])
                ->take(4)
                ->get();

            $leadsRecentes = \App\Models\Leads::whereNull('leads.deleted_at')
                ->join('anuncios', 'anuncios.id', '=', 'leads.anuncio_id')
                ->where('anuncios.anunciante_id', $anuncianteId)
                ->select('leads.*', 'anuncios.id_externo', 'anuncios.id as imovel_id')
                ->orderBy('leads.created_at', 'desc')
                ->take(5)
                ->get();
        }

        return view('painel.dashboard', compact(
            'usuario', 'totalAnunciosAdv', 'totalViewsAdv', 'totalLeadsAdv', 'totalFavoritosAdv',
            'anunciosLiberados', 'anunciosEmAnalise', 'anunciosRejeitados', 'anunciosExpirados',
            'anunciosMaisVisualizados', 'leadsRecentes'
        ));
    }

    public function PaginaInicial(){
        $tipos = \Illuminate\Support\Facades\Cache::remember('home_tipos', 600, function() {
            return AnuncioTipo::all();
        });
        
        $anunciantes = \Illuminate\Support\Facades\Cache::remember('home_anunciantes', 600, function() {
            return Anunciante::whereNull('deleted_at')->where('situacao_cadastro', 'Ativo')->orderByRaw('RAND()')->get();
        });
        
        $destaques = \Illuminate\Support\Facades\Cache::remember('home_destaques', 600, function() {
            return Anuncio::where('situacao', 'Liberado')
                ->with(['endereco.cidade.estado', 'tipo', 'fotos'])
                ->where(function ($query) {
                    $query->where('valor_venda', '<>', 0)->orWhere('valor_locacao', '<>', 0);
                })
                ->orderByRaw('RAND()')
                ->limit(12)
                ->get();
        });
        
        $cidades = \Illuminate\Support\Facades\Cache::remember('home_cidades', 600, function() {
            return Cidade::select('cidades.*')->where('anuncios.situacao', 'Liberado')
                                ->join('enderecos', 'enderecos.cidade_id', '=', 'cidades.id')
                                ->join('anuncios', 'anuncios.endereco_id', '=', 'enderecos.id')
                                ->GroupBy('cidades.id')->orderBy('cidades.total_anuncios', 'DESC')->get();
        });

        $totalAnuncios = \Illuminate\Support\Facades\Cache::remember('home_total_anuncios', 600, function() {
            return Anuncio::where('situacao', 'Liberado')->count();
        });

        $totalAnunciantes = \Illuminate\Support\Facades\Cache::remember('home_total_anunciantes', 600, function() {
            return Anunciante::whereNull('deleted_at')->where('situacao_cadastro', 'Ativo')->count();
        });

        $totalViews = \Illuminate\Support\Facades\Cache::remember('home_total_views', 600, function() {
            return \App\Models\RelatorioAnuncio::count();
        });
        
        return view('portal.index', compact('tipos', 'destaques', 'cidades', 'anunciantes', 'totalAnuncios', 'totalAnunciantes', 'totalViews'));
    }

    public function Financiamento(){
        return view('portal.financiamento');
    }

    public function IndicativosImobiliarios(){
        $indicativosPorAno = Indicativo::orderBy('data_publicacao', 'desc')->get()->groupBy('ano');
        return view('portal.indicativos', compact('indicativosPorAno'));
    }

    public function RedeImoveis(){
        $anunciantes = Anunciante::whereNull('deleted_at')->where('situacao_cadastro', 'Ativo')->orderByRaw('RAND()')->get();
        return view('portal.arede', compact('anunciantes'));
    }

    public function ComoAnunciar(){
        return view('portal.comoanunciar');
    }

    public function MapaDoSite(){
        return view('portal.mapadosite');
    }

    public function TermosDeUso(){
        return view('portal.termos');
    }

    public function PoliticaPrivacidade(){
        return view('portal.privacidade');
    }

    public function ImoveisFavoritos(){
        return view('portal.favoritos');
    }




}
