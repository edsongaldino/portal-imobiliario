<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Models\Anuncio;
use App\Http\Controllers\Controller;
use App\Models\AnuncioFinalidade;
use App\Models\AnuncioTipo;
use App\Models\Caracteristica;
use App\Models\Cidade;
use App\Models\Estado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AnuncioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $anuncios = Anuncio::where('anunciante_id', Auth::user()->anunciante->id)->paginate(20);
        $tipos = AnuncioTipo::all();
        return view('painel.anuncios.lista', compact('anuncios', 'tipos'));
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
        if((New Anuncio())->verificaDuplicidade('id_externo', $request->id_externo)){
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
    public function edit(Anuncio $anuncio)
    {
        //
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
        $anuncios = Anuncio::select('anuncios.*')->where('anuncios.situacao', 'Liberado')
                            ->join('enderecos', 'anuncios.endereco_id', '=', 'enderecos.id');

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

        if($request->tipo_imovel){
            $itens = DB::table('tipos')->select('id')->whereIn('id', $request->tipo_imovel)->get();
            foreach($itens as $item){
                $tiposArray[] = $item->id;
            }

            $anuncios = $anuncios->whereIn('tipo_id',$tiposArray);
        }

        $total =  $anuncios->count();
        $anuncios = $anuncios->GroupBy('anuncios.id')->orderBy('anuncios.valor_venda', 'ASC')->paginate(20);
        $tipos = AnuncioTipo::all();
        $destaques = Anuncio::where('situacao', 'Liberado')->limit(3)->get();
        $cidades = Cidade::select('cidades.*')->where('anuncios.situacao', 'Liberado')
                            ->join('enderecos', 'enderecos.cidade_id', '=', 'cidades.id')
                            ->join('anuncios', 'anuncios.endereco_id', '=', 'enderecos.id')
                            ->GroupBy('cidades.id')->orderBy('cidades.total_anuncios', 'DESC')->get();
        return view('portal.lista', compact('anuncios', 'tipos', 'total', 'destaques', 'cidades', 'request'));
    }

    public function ListaAnuncios($transacao)
    {
        $anuncios = Anuncio::where('situacao', 'Liberado');

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
        $anuncios = $anuncios->orderBy('valor_venda', 'ASC')->paginate(20);
        $tipos = AnuncioTipo::all();
        $destaques = Anuncio::where('situacao', 'Liberado')->limit(3)->get();
        $cidades = Cidade::select('cidades.*')->where('anuncios.situacao', 'Liberado')
                            ->join('enderecos', 'enderecos.cidade_id', '=', 'cidades.id')
                            ->join('anuncios', 'anuncios.endereco_id', '=', 'enderecos.id')
                            ->GroupBy('cidades.id')->get();
        return view('portal.lista', compact('anuncios', 'tipos', 'total', 'destaques', 'cidades','request'));
    }

    public function ListaAnunciosByAnunciante($id)
    {
        $anuncios = Anuncio::where('situacao', 'Liberado')->where('anunciante_id',$id);

        $request = new Request();
        $total =  $anuncios->count();
        $anuncios = $anuncios->orderBy('valor_venda', 'ASC')->paginate(20);
        $tipos = AnuncioTipo::all();
        $destaques = Anuncio::where('situacao', 'Liberado')->limit(3)->get();
        $cidades = Cidade::select('cidades.*')->where('anuncios.situacao', 'Liberado')
                            ->join('enderecos', 'enderecos.cidade_id', '=', 'cidades.id')
                            ->join('anuncios', 'anuncios.endereco_id', '=', 'enderecos.id')
                            ->GroupBy('cidades.id')->get();
        return view('portal.lista', compact('anuncios', 'tipos', 'total', 'destaques', 'cidades','request'));
    }



    public function DetalhesAnuncio($id){
        $anuncio = Anuncio::find($id);
        $destaques = Anuncio::where('situacao', 'Liberado')->limit(3)->get();
        $latLong = Helper::get_lat_long($anuncio->endereco->logradouro_endereco.','.$anuncio->endereco->bairro_endereco.','.$anuncio->endereco->cidade->nome_cidade.','.$anuncio->endereco->cidade->estado->uf_estado);

        return view('portal.detalhes', compact('anuncio', 'destaques', 'latLong'));
    }

    #ENDCONTROLLERSPORTAL
}
