<?php

namespace App\Http\Controllers;

use App\Models\AnuncioFinalidade;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AnuncioFinalidadeController extends Controller
{
    public function GetFinalidadeByTipo($tipo){
        $finalidade = explode(" ", $tipo);

        if(trim($finalidade[0]) == 'Residential'){
            $finalidade = 'Residencial';
        }else{
            $finalidade = 'Comercial';
        }
        return $finalidade;
    }
}
