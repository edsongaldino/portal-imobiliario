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
    public function BuscaAnuncios(Request $request)
    {
        $anuncios = Anuncio::select('anuncios.*')
                            ->where('anuncios.situacao', 'Liberado')
                            ->where('anunciantes.situacao_cadastro', 'Ativo')
                            ->where(function ($query) {$query->where('anuncios.valor_venda', '<>', 0)->orWhere('anuncios.valor_locacao', '<>', 0); })
                            ->join('enderecos', 'anuncios.endereco_id', '=', 'enderecos.id')
                            ->join('anunciantes', 'anuncios.anunciante_id', '=', 'anunciantes.id');

        switch($request->transacao){
            case 'Lançamentos':
                $anuncios = $anuncios->where('lancamento','S');
                break;
            case 'Locação':
                $anuncios = $anuncios->where('transacao','Locação');
                break;
            case 'Venda':
                $anuncios = $anuncios->where('transacao','Venda');
                break;
        }

        if($request->localizacao){
            $anuncios = $anuncios->where('enderecos.cidade_id',$request->localizacao);
        }

        $itens = DB::table('tipos')->select('id')->whereIn('id', $request->tipo_imovel ?? [0])->get();

        if($itens->count() > 0){
            foreach($itens as $item){
                $tiposArray[] = $item->id;
            }
            $anuncios = $anuncios->whereIn('tipo_id',$tiposArray);
        }

        if($request->palavra_chave){
            $anuncios = $anuncios->where('anuncios.titulo', 'like', '%' . $request->palavra_chave . '%');
        }

        $total =  $anuncios->count();
        $anuncios = $anuncios->GroupBy('anuncios.id')->orderBy('anuncios.valor_venda', 'ASC')->paginate(20);
        $tipos = AnuncioTipo::all();
        $destaques = Anuncio::where('situacao', 'Liberado')->limit(3)->get();
        $cidades = Cidade::select('cidades.*')->where('anuncios.situacao', 'Liberado')
                            ->join('enderecos', 'enderecos.cidade_id', '=', 'cidades.id')
                            ->join('anuncios', 'anuncios.endereco_id', '=', 'enderecos.id')
                            ->GroupBy('cidades.id')->orderBy('cidades.total_anuncios', 'DESC')->get();
        return view($this->viewLista, compact('anuncios', 'tipos', 'total', 'destaques', 'cidades', 'request'));
    }

    public function ListaAnuncios($transacao)
    {
        $anuncios = Anuncio::where('situacao', 'Liberado')->where(function ($query) {$query->where('anuncios.valor_venda', '<>', 0)->orWhere('anuncios.valor_locacao', '<>', 0); });

        switch($transacao){
            case 'novos':
                $anuncios = $anuncios->where('lancamento','S');
                break;
            case 'locacao':
                $anuncios = $anuncios->where('transacao','Locação');
                break;
            case 'venda':
                $anuncios = $anuncios->where('transacao','Venda');
                break;
        }
        
        $request = new Request();
        $total =  $anuncios->count();
        $anuncios = $anuncios->orderBy('valor_venda', 'ASC')->paginate(50);
        $tipos = AnuncioTipo::all();
        $destaques = Anuncio::where('situacao', 'Liberado')->limit(3)->get();
        $cidades = Cidade::select('cidades.*')->where('anuncios.situacao', 'Liberado')
                            ->join('enderecos', 'enderecos.cidade_id', '=', 'cidades.id')
                            ->join('anuncios', 'anuncios.endereco_id', '=', 'enderecos.id')
                            ->GroupBy('cidades.id')->get();
        return view($this->viewLista, compact('anuncios', 'tipos', 'total', 'destaques', 'cidades','request'));
    }

    public function ListaAnunciosByAnunciante($id)
    {
        $anuncios = Anuncio::where('situacao', 'Liberado')->where('anunciante_id',$id);

        $request = new Request();
        $total =  $anuncios->count();
        $anuncios = $anuncios->orderBy('valor_venda', 'ASC')->paginate(50);
        $tipos = AnuncioTipo::all();
        $destaques = Anuncio::where('situacao', 'Liberado')->limit(3)->get();
        $cidades = Cidade::select('cidades.*')->where('anuncios.situacao', 'Liberado')
                            ->join('enderecos', 'enderecos.cidade_id', '=', 'cidades.id')
                            ->join('anuncios', 'anuncios.endereco_id', '=', 'enderecos.id')
                            ->GroupBy('cidades.id')->get();
        return view($this->viewLista, compact('anuncios', 'tipos', 'total', 'destaques', 'cidades','request'));
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
