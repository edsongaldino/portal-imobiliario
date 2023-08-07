<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Models\Endereco;
use App\Http\Controllers\Controller;
use App\Models\Cidade;
use Illuminate\Http\Request;

class EnderecoController extends Controller
{
    public function salvarEndereco(Request $request){

        $endereco = new Endereco();
        $endereco->cidade_id = $request->cidade_endereco ?? '5103403';
        $endereco->cep_endereco = Helper::limpa_campo($request->cep_endereco ?? '78000000');
        $endereco->logradouro_endereco = $request->logradouro_endereco ?? 'Av. do CPA';
        $endereco->numero_endereco = $request->numero_endereco ?? '100';
        $endereco->complemento_endereco = $request->complemento_endereco ?? 'Provisório';
        $endereco->bairro_endereco = $request->bairro_endereco ?? 'Centro';
        $endereco->save();

        return $endereco;
    }

    public function getCidades(Request $request)
    {
        $estado_id = $request->id;
        $cidades = Cidade::where('estado_id','=', $estado_id)->orderBy('nome_cidade','asc')->get();
        return view('global.getCidades', compact('cidades'));
    }

    public function getBairros(Request $request)
    {
        $cidade_id = $request->id;
        $bairros = Endereco::where('cidade_id','=', $cidade_id)->groupBy('bairro_endereco')->orderBy('bairro_endereco','asc')->get();

        return view('global.getBairros', compact('bairros'));
    }

    public function updateEndereco(Request $request, $id){

        $endereco = Endereco::findOrFail($id);
        $endereco->cidade_id = $request->cidade_endereco ?? $request->cidade_old;
        $endereco->cep_endereco = Helper::limpa_campo($request->cep_endereco);
        $endereco->logradouro_endereco = $request->logradouro_endereco;
        $endereco->numero_endereco = $request->numero_endereco;
        $endereco->complemento_endereco = $request->complemento_endereco;
        $endereco->bairro_endereco = $request->bairro_endereco;
        $endereco->save();

        return $endereco;
    }
}
