<?php

namespace App\Http\Controllers;

use App\Models\Integracao;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IntegracaoController extends Controller
{
    public function Configuracao()
    {
        $usuario = Auth::user();
        return view('painel.integracao.configuracao', compact('usuario'));
    }

    public function Relatorio()
    {
        $usuario = Auth::user();
        return view('painel.integracao.relatorio', compact('usuario'));
    }

    public function LerXML(){
        //se o caminho esteja hospedado noutro servidor
        $url = "https://locare-xml.s3.amazonaws.com/locare_xml/imoveis_rosa_zapp.xml";

        //caso o caminho esteja hospedado no próprio servidor
        //coloque o ficheiro no caminho: 'public/assets/xml/file.xml'
        //$url = asset('assets/xml/file.xml');

        $data = file_get_contents($url);
        $xml = simplexml_load_string($data);

        foreach($xml->Listings->Listing as $imovel){
            echo $imovel->ListingID;
        }

    }
}
