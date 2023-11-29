<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Models\Leads;
use App\Http\Controllers\Controller;
use App\Mail\EnviaLead;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class LeadsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $leads = Leads::where('deleted_at','<>',null)->paginate(10);
        return view('painel.leads.lista', compact('leads'));
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
    public function store(Request $request)
    {
        $lead = new Leads();
        $lead->anuncio_id = $request->anuncio_id;
        $lead->nome = $request->nome;
        $lead->email = $request->email;
        $lead->telefone = Helper::limpa_campo($request->telefone);
        $lead->mensagem = $request->mensagem;

        if($lead->save()){
            $destinatario = 'edsongaldino@outlook.com';
            Mail::to($destinatario)->send(new EnviaLead($lead));
            response()->json(['success' => 'success'], 200);
        }else{
            response()->json(['error' => 'invalid'], 401);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Leads  $leads
     * @return \Illuminate\Http\Response
     */
    public function show(Leads $leads)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Leads  $leads
     * @return \Illuminate\Http\Response
     */
    public function edit(Leads $leads)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Leads  $leads
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Leads $leads)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Leads  $leads
     * @return \Illuminate\Http\Response
     */
    public function destroy(Leads $leads)
    {
        //
    }
}
