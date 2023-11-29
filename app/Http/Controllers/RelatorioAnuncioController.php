<?php

namespace App\Http\Controllers;

use App\Models\RelatorioAnuncio;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RelatorioAnuncioController extends Controller
{
    public function store($anuncio_id, $tipo)
    {
        $relatorio = new RelatorioAnuncio();
        $relatorio->anuncio_id = $anuncio_id;
        $relatorio->tipo = $tipo;

        if($relatorio->save()){
            return 'Sucesso';
        }else{
            return 'Erro';
        }

    }
}
