<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Models\Anuncio;
use App\Http\Controllers\Controller;
use App\Models\Anunciante;
use App\Models\AnuncioFinalidade;
use App\Models\AnuncioTipo;
use App\Models\Caracteristica;
use App\Models\Cidade;
use App\Models\Estado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Jenssegers\Agent\Agent;
use OpenApi\Annotations as OA;

class AnuncioController extends Controller
{

    private $viewLista;
    private $viewDetalhes;

    public function __construct()
    {
        $agent = new Agent();
        $this->viewLista = $agent->isMobile() ? 'portal.mobile.lista' : 'portal.lista';
        $this->viewDetalhes = $agent->isMobile() ? 'portal.mobile.detalhes' : 'portal.detalhes';
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = Auth::user();
        $anuncianteId = $user->anunciante_id ?? ($user->anunciante->id ?? null);

        $query = Anuncio::with(['fotos', 'tipo', 'endereco.cidade']);

        if ($user->perfil_id != 1) {
            $query->where('anunciante_id', $anuncianteId);
        }

        if ($request->filled('busca')) {
            $busca = $request->busca;
            $query->where(function($q) use ($busca) {
                $q->where('titulo', 'like', "%{$busca}%")
                  ->orWhere('id_externo', 'like', "%{$busca}%")
                  ->orWhere('id', '=', $busca);
            });
        }

        if ($request->filled('tipo_negocio')) {
            $query->where('transacao', $request->tipo_negocio);
        }

        if ($request->filled('status')) {
            $query->where('situacao', $request->status);
        }

        if ($request->filled('data_inicio') && $request->filled('data_fim')) {
            $query->whereBetween('created_at', [$request->data_inicio . ' 00:00:00', $request->data_fim . ' 23:59:59']);
        }

        $perPage = $request->input('per_page', 10);
        $anuncios = $query->orderBy('created_at', 'desc')->paginate($perPage);

        // Stats calculation
        $statsBase = Anuncio::query();
        if ($user->perfil_id != 1) {
            $statsBase->where('anunciante_id', $anuncianteId);
        }

        $totalAnuncios = (clone $statsBase)->count();
        $totalLiberados = (clone $statsBase)->where(function($q) {
            $q->where('situacao', 'Liberado')->orWhere('situacao', 'Ativo')->orWhereNull('situacao');
        })->count();
        $totalAguardando = (clone $statsBase)->where('situacao', 'Aguardando')->count();
        $totalBloqueados = (clone $statsBase)->where('situacao', 'Bloqueado')->count();

        $filtrosAtivos = 0;
        foreach (['busca', 'tipo_negocio', 'status', 'data_inicio', 'data_fim'] as $f) {
            if ($request->filled($f)) $filtrosAtivos++;
        }

        return view('painel.anuncios.lista', compact(
            'anuncios', 'totalAnuncios', 'totalLiberados', 
            'totalAguardando', 'totalBloqueados', 'filtrosAtivos', 'request'
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $estados = Estado::all();
        $cidades = Cidade::all();
        $tipos = AnuncioTipo::all();
        return view('painel.anuncios.incluir', compact('estados', 'cidades', 'tipos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if((New Anuncio())->verificaDuplicidade('id_externo', $request->id_externo, $request->anunciante_id)){
            return redirect()->back()->with('warning', 'Este anúncio já consta em nosso banco de dados! Verifique.');
        }

        $endereco = (new EnderecoController())->salvarEndereco($request);

        $anuncio = new Anuncio();
        $anuncio->finalidade_id = $request->finalidade_id;
        $anuncio->tipo_id = $request->tipo_id;
        $anuncio->anunciante_id = $request->anunciante_id;
        $anuncio->endereco_id = $endereco->id;
        $anuncio->transacao = $request->transacao;
        $anuncio->id_externo = $request->id_externo;
        $anuncio->titulo = $request->titulo;
        $anuncio->descricao = $request->descricao;
        $anuncio->valor_venda = Helper::converte_reais_to_mysql($request->valor_venda);
        $anuncio->valor_locacao = Helper::converte_reais_to_mysql($request->valor_locacao);
        $anuncio->valor_condominio = Helper::converte_reais_to_mysql($request->valor_condominio);
        $anuncio->situacao = $request->situacao;

        if($anuncio->save()){
            //Envia e-mail de confirmação Ao clicar no link do e-mail o anunciante cria o login
            return redirect()->route('sistema.anuncios')->with('success', 'Dados Cadastrados!');
        }else{
            return redirect()->route('sistema.anuncios')->with('error', 'Ops!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Anuncio  $anuncio
     * @return \Illuminate\Http\Response
     */
    public function show(Anuncio $anuncio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Anuncio  $anuncio
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $anuncio = Anuncio::find($id);
        $estados = Estado::all();
        $cidades = Cidade::all();
        $tipos = AnuncioTipo::all();
        return view('painel.anuncios.editar', compact('anuncio', 'tipos', 'estados', 'cidades'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Anuncio  $anuncio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $anuncio = Anuncio::findOrFail($request->id);
        $anuncio->finalidade_id = $request->finalidade_id;
        $anuncio->tipo_id = $request->tipo_id;
        $anuncio->transacao = $request->transacao;
        $anuncio->id_externo = $request->id_externo;
        $anuncio->titulo = $request->titulo;
        $anuncio->descricao = $request->descricao;
        $anuncio->valor_venda = Helper::converte_reais_to_mysql($request->valor_venda);
        $anuncio->valor_locacao = Helper::converte_reais_to_mysql($request->valor_locacao);
        $anuncio->valor_condominio = Helper::converte_reais_to_mysql($request->valor_condominio);
        $anuncio->situacao = $request->situacao;

        (new EnderecoController())->updateEndereco($request, $request->endereco_id);

        if($anuncio->save()){
            //Envia e-mail de confirmação Ao clicar no link do e-mail o anunciante cria o login
            return redirect()->route('sistema.anuncios')->with('success', 'Dados Atualizados!');
        }else{
            return redirect()->route('sistema.anuncios')->with('error', 'Ops!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Anuncio  $anuncio
     * @return \Illuminate\Http\Response
     */
    public function destroy(Anuncio $anuncio)
    {
        //
    }


    #CONTROLLERSPORTAL
    private function aplicarFiltrosEOrdenacao($query, Request $request, $transacaoExplicita = null)
    {
        $transacao = $transacaoExplicita ?? $request->transacao;
        if ($transacao) {
            switch($transacao){
                case 'Lançamentos':
                case 'novos':
                case 'Novos':
                    $query->where('anuncios.lancamento', 'S');
                    break;
                case 'Locação':
                case 'locacao':
                case 'Alugar':
                    $query->where('anuncios.transacao', 'Locação');
                    break;
                case 'Venda':
                case 'venda':
                case 'Comprar':
                    $query->where('anuncios.transacao', 'Venda');
                    break;
            }
        }

        if ($request->filled('localizacao')) {
            $query->where('enderecos.cidade_id', $request->localizacao);
        }

        if ($request->filled('tipo_imovel')) {
            $tipos = (array) $request->tipo_imovel;
            $tipos = array_filter($tipos, function($val) { return is_numeric($val) && $val > 0; });
            if (!empty($tipos)) {
                $query->whereIn('anuncios.tipo_id', $tipos);
            }
        }

        if ($request->filled('palavra_chave')) {
            $query->where('anuncios.titulo', 'like', '%' . $request->palavra_chave . '%');
        }

        if ($request->filled('valor_minimo')) {
            $min = Helper::converte_reais_to_mysql($request->valor_minimo);
            if ($min > 0) {
                $query->where(function($q) use ($min) {
                    $q->where('anuncios.valor_venda', '>=', $min)
                      ->orWhere('anuncios.valor_locacao', '>=', $min);
                });
            }
        }

        if ($request->filled('valor_maximo')) {
            $max = Helper::converte_reais_to_mysql($request->valor_maximo);
            if ($max > 0) {
                $query->where(function($q) use ($max) {
                    $q->where(function($sub) use ($max) {
                        $sub->where('anuncios.valor_venda', '<=', $max)->where('anuncios.valor_venda', '>', 0);
                    })->orWhere(function($sub) use ($max) {
                        $sub->where('anuncios.valor_locacao', '<=', $max)->where('anuncios.valor_locacao', '>', 0);
                    });
                });
            }
        }

        $infoFilters = [
            'quartos' => 'Quartos',
            'banheiros' => 'Banheiros',
            'garagem' => 'Garagem'
        ];
        foreach ($infoFilters as $param => $chave) {
            if ($request->filled($param)) {
                $vals = (array) $request->$param;
                $query->whereHas('informacoes', function($q) use ($chave, $vals) {
                    $q->where('chave', $chave)->where(function($sub) use ($vals) {
                        foreach ($vals as $val) {
                            if ($val >= 6) {
                                $sub->orWhereRaw('CAST(valor AS UNSIGNED) >= 6');
                            } else {
                                $sub->orWhere('valor', $val);
                            }
                        }
                    });
                });
            }
        }

        if ($request->filled('area_minima')) {
            $areaMin = Helper::converte_reais_to_mysql($request->area_minima);
            if ($areaMin > 0) {
                $query->whereHas('informacoes', function($q) use ($areaMin) {
                    $q->where(function($sub) {
                        $sub->where('chave', 'Área Útil')->orWhere('chave', 'LivingArea');
                    })->whereRaw('CAST(valor AS DECIMAL(10,2)) >= ?', [$areaMin]);
                });
            }
        }

        if ($request->filled('area_maxima')) {
            $areaMax = Helper::converte_reais_to_mysql($request->area_maxima);
            if ($areaMax > 0) {
                $query->whereHas('informacoes', function($q) use ($areaMax) {
                    $q->where(function($sub) {
                        $sub->where('chave', 'Área Útil')->orWhere('chave', 'LivingArea');
                    })->whereRaw('CAST(valor AS DECIMAL(10,2)) <= ?', [$areaMax]);
                });
            }
        }

        if ($request->filled('caracteristicas')) {
            $caracteristicas = (array) $request->caracteristicas;
            foreach ($caracteristicas as $caract) {
                $query->whereHas('informacoes', function($q) use ($caract) {
                    $q->where('chave', $caract);
                });
            }
        }

        if ($request->filled('ordenacao')) {
            switch ($request->ordenacao) {
                case 'menor_valor':
                    $query->orderByRaw("CASE WHEN anuncios.transacao = 'Locação' THEN anuncios.valor_locacao ELSE anuncios.valor_venda END ASC");
                    break;
                case 'maior_valor':
                    $query->orderByRaw("CASE WHEN anuncios.transacao = 'Locação' THEN anuncios.valor_locacao ELSE anuncios.valor_venda END DESC");
                    break;
                case 'relevantes':
                default:
                    $query->orderByRaw("CASE WHEN anuncios.destaque = 'S' THEN 1 ELSE 2 END ASC")->orderBy('anuncios.id', 'DESC');
                    break;
            }
        } else {
            $query->orderByRaw("CASE WHEN anuncios.destaque = 'S' THEN 1 ELSE 2 END ASC")->orderBy('anuncios.id', 'DESC');
        }

        return $query;
    }

    public function BuscaAnuncios(Request $request)
    {
        $query = Anuncio::select('anuncios.*')
                            ->where('anuncios.situacao', 'Liberado')
                            ->where('anunciantes.situacao_cadastro', 'Ativo')
                            ->where(function ($q) {
                                $q->where('anuncios.valor_venda', '<>', 0)
                                  ->orWhere('anuncios.valor_locacao', '<>', 0);
                            })
                            ->join('enderecos', 'anuncios.endereco_id', '=', 'enderecos.id')
                            ->join('anunciantes', 'anuncios.anunciante_id', '=', 'anunciantes.id');

        $query = $this->aplicarFiltrosEOrdenacao($query, $request);

        $perPage = (int) $request->input('por_pagina', 24);
        $total = $query->distinct('anuncios.id')->count('anuncios.id');
        $anuncios = $query->groupBy('anuncios.id')->paginate($perPage);

        $tipos = AnuncioTipo::all();
        $destaques = Anuncio::where('situacao', 'Liberado')->limit(3)->get();
        $cidades = Cidade::select('cidades.*')->where('anuncios.situacao', 'Liberado')
                            ->join('enderecos', 'enderecos.cidade_id', '=', 'cidades.id')
                            ->join('anuncios', 'anuncios.endereco_id', '=', 'enderecos.id')
                            ->GroupBy('cidades.id')->orderBy('cidades.total_anuncios', 'DESC')->get();

        return view($this->viewLista, compact('anuncios', 'tipos', 'total', 'destaques', 'cidades', 'request'));
    }

    public function GetAnunciosContagem(Request $request)
    {
        $query = Anuncio::select('anuncios.id')
                            ->where('anuncios.situacao', 'Liberado')
                            ->where('anunciantes.situacao_cadastro', 'Ativo')
                            ->where(function ($q) {
                                $q->where('anuncios.valor_venda', '<>', 0)
                                  ->orWhere('anuncios.valor_locacao', '<>', 0);
                            })
                            ->join('enderecos', 'anuncios.endereco_id', '=', 'enderecos.id')
                            ->join('anunciantes', 'anuncios.anunciante_id', '=', 'anunciantes.id');

        $query = $this->aplicarFiltrosEOrdenacao($query, $request);

        $total = $query->distinct('anuncios.id')->count('anuncios.id');

        return response()->json(['total' => $total]);
    }

    public function ListaAnuncios(Request $request, $transacao = null)
    {
        $query = Anuncio::select('anuncios.*')
                            ->where('anuncios.situacao', 'Liberado')
                            ->where('anunciantes.situacao_cadastro', 'Ativo')
                            ->where(function ($q) {
                                $q->where('anuncios.valor_venda', '<>', 0)
                                  ->orWhere('anuncios.valor_locacao', '<>', 0);
                            })
                            ->join('enderecos', 'anuncios.endereco_id', '=', 'enderecos.id')
                            ->join('anunciantes', 'anuncios.anunciante_id', '=', 'anunciantes.id');

        $query = $this->aplicarFiltrosEOrdenacao($query, $request, $transacao);

        $perPage = (int) $request->input('por_pagina', 24);
        $total = $query->distinct('anuncios.id')->count('anuncios.id');
        $anuncios = $query->groupBy('anuncios.id')->paginate($perPage);

        $tipos = AnuncioTipo::all();
        $destaques = Anuncio::where('situacao', 'Liberado')->limit(3)->get();
        $cidades = Cidade::select('cidades.*')->where('anuncios.situacao', 'Liberado')
                            ->join('enderecos', 'enderecos.cidade_id', '=', 'cidades.id')
                            ->join('anuncios', 'anuncios.endereco_id', '=', 'enderecos.id')
                            ->GroupBy('cidades.id')->get();

        return view($this->viewLista, compact('anuncios', 'tipos', 'total', 'destaques', 'cidades', 'request'));
    }

    public function ListaAnunciosByAnunciante(Request $request, $id)
    {
        $query = Anuncio::select('anuncios.*')
                            ->where('anuncios.situacao', 'Liberado')
                            ->where('anunciantes.situacao_cadastro', 'Ativo')
                            ->where('anunciante_id', $id)
                            ->join('enderecos', 'anuncios.endereco_id', '=', 'enderecos.id')
                            ->join('anunciantes', 'anuncios.anunciante_id', '=', 'anunciantes.id');

        $query = $this->aplicarFiltrosEOrdenacao($query, $request);

        $perPage = (int) $request->input('por_pagina', 24);
        $total = $query->distinct('anuncios.id')->count('anuncios.id');
        $anuncios = $query->groupBy('anuncios.id')->paginate($perPage);

        $tipos = AnuncioTipo::all();
        $destaques = Anuncio::where('situacao', 'Liberado')->limit(3)->get();
        $cidades = Cidade::select('cidades.*')->where('anuncios.situacao', 'Liberado')
                            ->join('enderecos', 'enderecos.cidade_id', '=', 'cidades.id')
                            ->join('anuncios', 'anuncios.endereco_id', '=', 'enderecos.id')
                            ->GroupBy('cidades.id')->get();

        return view($this->viewLista, compact('anuncios', 'tipos', 'total', 'destaques', 'cidades', 'request'));
    }



    public function DetalhesAnuncio($id){
        $anuncio = Anuncio::find($id);

        if (!$anuncio || $anuncio->situacao == 'Bloqueado') {
            return redirect()->route('pagina-inicial')->with('error', 'Este anúncio não está mais disponível.');
        }

        $destaques = Anuncio::where('situacao', 'Liberado')->limit(3)->get();
        $latLong = Helper::get_lat_long($anuncio->endereco->logradouro_endereco.','.$anuncio->endereco->bairro_endereco.','.$anuncio->endereco->cidade->nome_cidade.','.$anuncio->endereco->cidade->estado->uf_estado);

        //Grava relatório
        (new RelatorioAnuncioController())->store($id, 'ViewDetalhes');

        return view($this->viewDetalhes, compact('anuncio', 'destaques', 'latLong'));
    }

    #ENDCONTROLLERSPORTAL

    /**
    *  @OA\GET(
    *      path="/api/anuncios",
    *      summary="Get all anúncios",
    *      description="Get all anúncios",
    *      tags={"Anúncios"},
    *      @OA\Parameter(
    *         name="name",
    *         in="query",
    *         description="name",
    *         required=false,
    *      ),
    *     @OA\Parameter(
    *         name="email",
    *         in="query",
    *         description="email",
    *         required=false,
    *      ),
    *     @OA\Parameter(
    *         name="page",
    *         in="query",
    *         description="Page Number",
    *         required=false,
    *      ),
    *      @OA\Response(
    *          response=200,
    *          description="OK",
    *          @OA\MediaType(
    *              mediaType="application/json",
    *          )
    *      ),
    *
    *  )
    */
    public function GetAnuncios()
    {
        $anuncios = Anuncio::where('anunciante_id', 1)->get();
        return response()->json([
            'status' => true,
            'anuncios' => $anuncios
        ]);
    }

    public function alterarStatus(Request $request, $id)
    {
        $anuncio = Anuncio::findOrFail($id);
        $anuncio->situacao = $request->input('status');
        $anuncio->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Status do anúncio atualizado com sucesso!'
        ]);
    }
}
