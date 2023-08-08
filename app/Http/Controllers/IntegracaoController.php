<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Models\Integracao;
use App\Http\Controllers\Controller;
use App\Models\Anuncio;
use App\Models\AnuncioFotos;
use App\Models\Endereco;
use App\Models\LogIntegracao;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request as FacadesRequest;

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
        $logs = DB::table('log_integracoes')
                ->join('anuncios', 'anuncios.id_externo', '=', 'log_integracoes.id_externo')
                ->where('anuncios.anunciante_id',Auth::user()->anunciante->id)
                ->select('log_integracoes.*', 'anuncios.titulo as tituloAnuncio')
                ->paginate(15);

        return view('painel.integracao.relatorio', compact('usuario', 'logs'));
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

            $anunciante_id = 1;

            if((New Anuncio())->verificaDuplicidade('id_externo', $imovel->ListingID)){

            }else{

                $endereco = new Endereco();
                $endereco->cidade_id = (New EnderecoController())->getIDCidadeByNome($imovel->Location->City) ?? '5103403';
                $endereco->cep_endereco = Helper::limpa_campo($imovel->Location->PostalCode ?? '78000000');
                $endereco->logradouro_endereco = $imovel->Location->Address ?? 'Av. do CPA';
                $endereco->numero_endereco = $imovel->Location->StreetNumber ?? '100';
                $endereco->complemento_endereco = 'Complemento';
                $endereco->bairro_endereco = $imovel->Location->Neighborhood ?? 'Centro';

                $endereco->save();

                switch($imovel->TransactionType){
                    case 'Sale/Rent':
                        $transacao = 'Locação/Venda';
                        break;
                    case 'Sale':
                        $transacao = 'Venda';
                        break;
                    case 'Rent':
                        $transacao = 'Locação';
                        break;
                    default:
                        $transacao = 'Locação/Venda';
                        break;
                }

                switch($imovel->PublicationType){
                    case 'STANDARD':
                        $tipo_publicacao = 'STANDARD';
                        break;
                    case 'PREMIUM':
                        $tipo_publicacao = 'PREMIUM';
                        break;
                    case 'SUPER_PREMIUM':
                        $tipo_publicacao = 'PREMIUM';
                        break;
                    default:
                        $tipo_publicacao = 'STANDARD';
                        break;
                }

                $anuncio = new Anuncio();
                $anuncio->finalidade = (New AnuncioFinalidadeController())->GetFinalidadeByTipo($imovel->Details->PropertyType);
                $anuncio->tipo_publicacao = $tipo_publicacao;
                $anuncio->tipo_id = (New AnuncioTipoController())->GetIDTipoByNome($imovel->Details->PropertyType);
                $anuncio->anunciante_id = $anunciante_id;
                $anuncio->endereco_id = $endereco->id;
                $anuncio->transacao = $transacao;
                $anuncio->id_externo = $imovel->ListingID;
                $anuncio->titulo = $imovel->Title;
                $anuncio->descricao = $imovel->Details->Description;
                $anuncio->valor_venda = Helper::converte_reais_to_mysql($imovel->Details->ListPrice ?? 0.00);
                $anuncio->valor_locacao = Helper::converte_reais_to_mysql($imovel->Details->RentalPrice ?? 0.00);
                $anuncio->valor_condominio = Helper::converte_reais_to_mysql(0.00);
                $anuncio->situacao = 'Liberado';

                if($anuncio->save()){

                    foreach($imovel->Media as $foto){

                        if(isset($foto->Item->attributes()->primary)){
                            $destaque = 'S';
                        }else{
                            $destaque = 'N';
                        }

                        $fotos = new AnuncioFotos();
                        $fotos->anuncio_id = $anuncio->id;
                        $fotos->titulo = $foto->Item->attributes()->caption ?? $imovel->Title;
                        $fotos->arquivo = $foto->Item;
                        $fotos->destaque = $destaque;
                        $fotos->save();
                    }

                    $tipo_log = "Sucesso";
                    $titulo = "Imóvel integrado com sucesso";
                    $descricao_log = "Imóvel integrado com sucesso";

                }else{
                    $tipo_log = "Erro";
                    $titulo = "O Imóvel não foi integrado totalmente";
                    $descricao_log = "Informações importantes estão ausentes";
                }

                (New LogIntegracaoController())->gravaLog($imovel->ListingID, $tipo_log, $titulo, $descricao_log);

            }

        }

    }
}
