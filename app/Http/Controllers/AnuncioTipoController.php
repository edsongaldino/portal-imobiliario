<?php

namespace App\Http\Controllers;

use App\Models\AnuncioTipo;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AnuncioTipoController extends Controller
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AnuncioTipo  $anuncioTipo
     * @return \Illuminate\Http\Response
     */
    public function show(AnuncioTipo $anuncioTipo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AnuncioTipo  $anuncioTipo
     * @return \Illuminate\Http\Response
     */
    public function edit(AnuncioTipo $anuncioTipo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AnuncioTipo  $anuncioTipo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AnuncioTipo $anuncioTipo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AnuncioTipo  $anuncioTipo
     * @return \Illuminate\Http\Response
     */
    public function destroy(AnuncioTipo $anuncioTipo)
    {
        //
    }


    public function GetIDTipoByNome($nome){
        $tipo = AnuncioTipo::where('nome_ingles', $nome)->get()->first();
        if(isset($tipo->id)){
            return $tipo->id;
        }else{
            return 1;
        }
    }
}
