<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Models\Anunciante;
use App\Http\Controllers\Controller;
use App\Mail\SendMailUser;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AnuncianteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function CadastrarAnunciante(Request $request)
    {
        if((New Anunciante())->verificaDuplicidade('cnpj', $request->cnpj)){
            return redirect()->back()->with('warning', 'Este CNPJ já consta em nosso banco de dados! Verifique.');
        }

        $endereco = (new EnderecoController())->salvarEndereco($request);

        $anunciante = new Anunciante();
        $anunciante->endereco_id = $endereco->id;
        $anunciante->tipo_anunciante = $request->tipo_anunciante;
        $anunciante->nome = $request->nome;
        $anunciante->descricao = $request->descricao ?? $request->nome;
        $anunciante->creci = $request->creci;
        $anunciante->cnpj = Helper::limpa_campo($request->cnpj);
        $anunciante->razao_social = $request->razao_social ?? $request->nome;
        $anunciante->inscricao_estadual = $request->inscricao_estadual;
        $anunciante->inscricao_municipal = $request->inscricao_municipal;
        $anunciante->site = $request->site;
        $anunciante->whatsapp = Helper::limpa_campo($request->whatsapp);
        $anunciante->telefone_comercial = Helper::limpa_campo($request->telefone_comercial);
        $anunciante->email = $request->email;

        if($anunciante->save()){

            $User = new User();
            if($request->tipo_anunciante == 'Imobiliária'){
                $User->perfil_id = 2;
            }else{
                $User->perfil_id = 3;
            }
            $User->anunciante_id = $anunciante->id;
            $User->name = $request->nome;
            $User->email = $request->email;
            $User->password = Hash::make($request->password);

            if($User->save()){
                Mail::to($request->email)->send(new SendMailUser($anunciante))->cc('contato@redeimoveismt.com.br');
                //return true;
            }else{
                return false;
            }

        }else{
            return redirect()->back()->with('warning', 'Ocorreram erros no seu cadastro! Verifique.');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Anunciante  $Anunciante
     * @return \Illuminate\Http\Response
     */
    public function show(Anunciante $Anunciante)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Anunciante  $Anunciante
     * @return \Illuminate\Http\Response
     */
    public function edit(Anunciante $Anunciante)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Anunciante  $Anunciante
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Anunciante $Anunciante)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Anunciante  $Anunciante
     * @return \Illuminate\Http\Response
     */
    public function destroy(Anunciante $Anunciante)
    {
        //
    }
}
