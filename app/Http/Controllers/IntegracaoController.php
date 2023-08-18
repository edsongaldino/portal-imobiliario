<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Models\Integracao;
use App\Http\Controllers\Controller;
use App\Models\Anunciante;
use App\Models\AnuncianteIntegracao;
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
        $integracao = AnuncianteIntegracao::where('anunciante_id',$usuario->anunciante_id)->first();
        return view('painel.integracao.configuracao', compact('usuario','integracao'));
    }

    public function salvarDados(Request $request){

        if($request->id <> ''){
            $anunciante_integracao = AnuncianteIntegracao::find($request->id);
        }else{
            $anunciante_integracao = new AnuncianteIntegracao();
        }

        $anunciante_integracao->anunciante_id = Auth::user()->anunciante_id;
        $anunciante_integracao->integracao_id = 1; //XML
        $anunciante_integracao->arquivo = $request->url;
        $anunciante_integracao->url = $request->url;
        $anunciante_integracao->periodicidade_atualizacao = $request->periodicidade_atualizacao;
        $anunciante_integracao->notificar = $request->notificar;
        $anunciante_integracao->save();

        return redirect()->back()->with('success', 'Dados Gravados!');
    }

    public function RelatorioGeral()
    {
        $usuario = Auth::user();
        $logs = LogIntegracao::where('anunciante_id',Auth::user()->anunciante->id)->paginate(15);

        return view('painel.integracao.relatorio_geral', compact('usuario', 'logs'));
    }

    public function RelatorioIndividual($id)
    {
        $usuario = Auth::user();
        $RelatorioGeral = LogIntegracao::find($id);
        $logs = DB::table('log_integracao_anuncios')
                ->join('anuncios', 'anuncios.id_externo', '=', 'log_integracao_anuncios.id_externo')
                ->where('log_integracao_anuncios.id', $id)
                ->select('log_integracao_anuncios.*', 'anuncios.titulo as tituloAnuncio')
                ->paginate(15);

        return view('painel.integracao.relatorio_individual', compact('usuario', 'logs', 'RelatorioGeral'));
    }


    public function ProcessarXML(Request $request){

        ini_set('max_execution_time', 240);

        $anunciante = Anunciante::find($request->id);
        $xml = $anunciante->integracao->first()->url;

        //se o caminho esteja hospedado noutro servidor
        $url = $xml;

        //caso o caminho esteja hospedado no próprio servidor
        //coloque o ficheiro no caminho: 'public/assets/xml/file.xml'
        //$url = asset('assets/xml/file.xml');

        $data = file_get_contents($url);
        $xml = simplexml_load_string($data);
        $anunciante_id = $anunciante->id;

        $total_alertas = 0;
        $total_incluidos = 0;
        $total_alterados = 0;
        $total_removidos = 0;

        $LogIntegracao = (New LogIntegracaoController())->gravaLog($anunciante_id, $total_alertas, $total_incluidos, $total_alterados, $total_removidos);

        foreach($xml->Listings->Listing as $imovel){

            if((New Anuncio())->verificaDuplicidade('id_externo', $imovel->ListingID)){

                $dadosAnuncio = Anuncio::where('id_externo',$imovel->ListingID)->first();
                $anuncio = Anuncio::find($dadosAnuncio->id);
                $anuncio->finalidade = (New AnuncioFinalidadeController())->GetFinalidadeByTipo($imovel->Details->PropertyType);
                $anuncio->tipo_publicacao = $this->GetTipoByPublicationType($imovel->PublicationType);
                $anuncio->tipo_id = (New AnuncioTipoController())->GetIDTipoByNome($imovel->Details->PropertyType);
                $anuncio->anunciante_id = $anunciante_id;
                $anuncio->transacao = $this->GetTransacaoByTransactionType($imovel->TransactionType);
                $anuncio->id_externo = $imovel->ListingID;
                $anuncio->titulo = $imovel->Title;
                $anuncio->descricao = $imovel->Details->Description;
                $anuncio->descricao_resumida = substr($imovel->Details->Description, 0, 250);
                $anuncio->valor_venda = Helper::converte_reais_to_mysql($imovel->Details->ListPrice ?? 0.00);
                $anuncio->valor_locacao = Helper::converte_reais_to_mysql($imovel->Details->RentalPrice ?? 0.00);
                $anuncio->valor_condominio = Helper::converte_reais_to_mysql(0.00);
                $anuncio->situacao = 'Liberado';
                $anuncio->destaque = $imovel->Details->Destaque ?? 'N';
                $anuncio->lancamento = $imovel->Details->Lancamento ?? 'N';


                $endereco = Endereco::find($dadosAnuncio->endereco_id);
                $endereco->cidade_id = (New EnderecoController())->getIDCidadeByNome($imovel->Location->City) ?? '5103403';
                $endereco->cep_endereco = Helper::limpa_campo($imovel->Location->PostalCode ?? '78000000');
                $endereco->logradouro_endereco = $imovel->Location->Address ?? 'Av. do CPA';
                $endereco->numero_endereco = $imovel->Location->StreetNumber ?? '100';
                $endereco->complemento_endereco = 'Complemento';
                $endereco->bairro_endereco = $imovel->Location->Neighborhood ?? 'Centro';
                $endereco->save();

                if($anuncio->save()){

                    foreach($imovel->Media->Item as $foto){

                        $fotos = new AnuncioFotos();
                        $fotos->anuncio_id = $anuncio->id;
                        $fotos->titulo = $foto->attributes()->caption ?? $imovel->Title;
                        $fotos->arquivo = $foto;

                        if(isset($foto->attributes()->primary)){
                            $fotos->destaque = 'S';
                        }else{
                            $fotos->destaque = 'N';
                        }

                        $fotos->save();
                    }

                    $tipo_log = "Sucesso";
                    $subtipo_log = "Atualização";
                    $titulo = "Imóvel atualizado com sucesso";
                    $descricao_log = "Imóvel atualizado com sucesso";

                }else{
                    $tipo_log = "Erro";
                    $subtipo_log = "Atualização";
                    $titulo = "O Imóvel não foi atualizado totalmente";
                    $descricao_log = "Informações importantes estão ausentes";
                }

                (New LogIntegracaoAnuncioController())->gravaLogAnuncio($LogIntegracao->id, $imovel->ListingID, $tipo_log, $subtipo_log, $titulo, $descricao_log);

                $total_alterados++;

            }else{

                $endereco = new Endereco();
                $endereco->cidade_id = (New EnderecoController())->getIDCidadeByNome($imovel->Location->City) ?? '5103403';
                $endereco->cep_endereco = Helper::limpa_campo($imovel->Location->PostalCode ?? '78000000');
                $endereco->logradouro_endereco = $imovel->Location->Address ?? 'Av. do CPA';
                $endereco->numero_endereco = $imovel->Location->StreetNumber ?? '100';
                $endereco->complemento_endereco = 'Complemento';
                $endereco->bairro_endereco = $imovel->Location->Neighborhood ?? 'Centro';

                $endereco->save();

                $anuncio = new Anuncio();
                $anuncio->finalidade = (New AnuncioFinalidadeController())->GetFinalidadeByTipo($imovel->Details->PropertyType);
                $anuncio->tipo_publicacao = $this->GetTipoByPublicationType($imovel->PublicationType);
                $anuncio->tipo_id = (New AnuncioTipoController())->GetIDTipoByNome($imovel->Details->PropertyType);
                $anuncio->anunciante_id = $anunciante_id;
                $anuncio->endereco_id = $endereco->id;
                $anuncio->transacao = $this->GetTransacaoByTransactionType($imovel->TransactionType);
                $anuncio->id_externo = $imovel->ListingID;
                $anuncio->titulo = $imovel->Title;
                $anuncio->descricao = $imovel->Details->Description;
                $anuncio->descricao_resumida = substr($imovel->Details->Description, 0, 250);
                $anuncio->valor_venda = Helper::converte_reais_to_mysql($imovel->Details->ListPrice ?? 0.00);
                $anuncio->valor_locacao = Helper::converte_reais_to_mysql($imovel->Details->RentalPrice ?? 0.00);
                $anuncio->valor_condominio = Helper::converte_reais_to_mysql(0.00);
                $anuncio->situacao = 'Liberado';

                if($anuncio->save()){

                    foreach($imovel->Media as $foto){

                        $fotos = new AnuncioFotos();
                        $fotos->anuncio_id = $anuncio->id;
                        $fotos->titulo = $foto->Item->attributes()->caption ?? $imovel->Title;
                        $fotos->arquivo = $foto->Item;

                        if(isset($foto->Item->attributes()->primary)){
                            $fotos->destaque = 'S';
                        }else{
                            $fotos->destaque = 'N';
                        }

                        $fotos->save();
                    }

                    $tipo_log = "Sucesso";
                    $subtipo_log = "Inclusão";
                    $titulo = "Imóvel integrado com sucesso";
                    $descricao_log = "Imóvel integrado com sucesso";

                }else{
                    $tipo_log = "Erro";
                    $subtipo_log = "Inclusão";
                    $titulo = "O Imóvel não foi integrado totalmente";
                    $descricao_log = "Informações importantes estão ausentes";
                }

                (New LogIntegracaoAnuncioController())->gravaLogAnuncio($LogIntegracao->id, $imovel->ListingID, $tipo_log, $subtipo_log, $titulo, $descricao_log);

                $total_incluidos++;
            }

        }

        $logoUpdate = (New LogIntegracaoController())->updateLog($LogIntegracao->id, $total_alertas, $total_incluidos, $total_alterados, $total_removidos);

        if($logoUpdate):
            $response_array['status'] = 'success';
            echo json_encode($response_array);
        else:
            $response_array['status'] = 'error';
            echo json_encode($response_array);
        endif;
    }

    public function GetTransacaoByTransactionType($TransactionType){
        switch($TransactionType){
            case 'Sale/Rent':
                $transacao = 'Locação/Venda';
                break;
            case 'For Sale':
                $transacao = 'Venda';
                break;
            case 'For Rent':
                $transacao = 'Locação';
                break;
            default:
                $transacao = 'Locação/Venda';
                break;
        }
        return $transacao;
    }

    public function GetTipoByPublicationType($PublicationType){
        switch($PublicationType){
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
        return $tipo_publicacao;
    }





    public function LerXML(){

        ini_set('max_execution_time', 240);

        $anunciante = Anunciante::find(1);
        $xml = $anunciante->integracao->first()->url;

        //se o caminho esteja hospedado noutro servidor
        $url = "https://locare-xml.s3.amazonaws.com/locare_xml/imoveis_rosa_zapp.xml";

        //caso o caminho esteja hospedado no próprio servidor
        //coloque o ficheiro no caminho: 'public/assets/xml/file.xml'
        //$url = asset('assets/xml/file.xml');

        $data = file_get_contents($url);
        $xml = simplexml_load_string($data);
        $anunciante_id = $anunciante->id;

        $total_alertas = 0;
        $total_incluidos = 0;
        $total_alterados = 0;
        $total_removidos = 0;

        $LogIntegracao = (New LogIntegracaoController())->gravaLog($anunciante_id, $total_alertas, $total_incluidos, $total_alterados, $total_removidos);

        foreach($xml->Listings->Listing as $imovel){

            if((New Anuncio())->verificaDuplicidade('id_externo', $imovel->ListingID)){

                $dadosAnuncio = Anuncio::where('id_externo',$imovel->ListingID)->first();
                $anuncio = Anuncio::find($dadosAnuncio->id);
                $anuncio->finalidade = (New AnuncioFinalidadeController())->GetFinalidadeByTipo($imovel->Details->PropertyType);
                $anuncio->tipo_publicacao = $this->GetTipoByPublicationType($imovel->PublicationType);
                $anuncio->tipo_id = (New AnuncioTipoController())->GetIDTipoByNome($imovel->Details->PropertyType);
                $anuncio->anunciante_id = $anunciante_id;
                $anuncio->transacao = $this->GetTransacaoByTransactionType($imovel->TransactionType);
                $anuncio->id_externo = $imovel->ListingID;
                $anuncio->titulo = $imovel->Title;
                $anuncio->descricao = $imovel->Details->Description;
                $anuncio->descricao_resumida = substr($imovel->Details->Description, 0, 250);
                $anuncio->valor_venda = Helper::converte_reais_to_mysql($imovel->Details->ListPrice ?? 0.00);
                $anuncio->valor_locacao = Helper::converte_reais_to_mysql($imovel->Details->RentalPrice ?? 0.00);
                $anuncio->valor_condominio = Helper::converte_reais_to_mysql(0.00);
                $anuncio->situacao = 'Liberado';
                $anuncio->destaque = $imovel->Details->Destaque ?? 'N';
                $anuncio->lancamento = $imovel->Details->Lancamento ?? 'N';


                $endereco = Endereco::find($dadosAnuncio->endereco_id);
                $endereco->cidade_id = (New EnderecoController())->getIDCidadeByNome($imovel->Location->City) ?? '5103403';
                $endereco->cep_endereco = Helper::limpa_campo($imovel->Location->PostalCode ?? '78000000');
                $endereco->logradouro_endereco = $imovel->Location->Address ?? 'Av. do CPA';
                $endereco->numero_endereco = $imovel->Location->StreetNumber ?? '100';
                $endereco->complemento_endereco = 'Complemento';
                $endereco->bairro_endereco = $imovel->Location->Neighborhood ?? 'Centro';
                $endereco->save();

                if($anuncio->save()){

                    foreach($imovel->Media->Item as $foto){

                        $fotos = new AnuncioFotos();
                        $fotos->anuncio_id = $anuncio->id;
                        $fotos->titulo = $foto->attributes()->caption ?? $imovel->Title;
                        $fotos->arquivo = $foto;

                        if(isset($foto->attributes()->primary)){
                            $fotos->destaque = 'S';
                        }else{
                            $fotos->destaque = 'N';
                        }

                        $fotos->save();
                    }

                    $tipo_log = "Sucesso";
                    $subtipo_log = "Atualização";
                    $titulo = "Imóvel atualizado com sucesso";
                    $descricao_log = "Imóvel atualizado com sucesso";

                }else{
                    $tipo_log = "Erro";
                    $subtipo_log = "Atualização";
                    $titulo = "O Imóvel não foi atualizado totalmente";
                    $descricao_log = "Informações importantes estão ausentes";
                }

                $log = (New LogIntegracaoAnuncioController())->gravaLogAnuncio($LogIntegracao->id, $imovel->ListingID, $tipo_log, $subtipo_log, $titulo, $descricao_log);
                $total_alterados++;

            }else{

                $endereco = new Endereco();
                $endereco->cidade_id = (New EnderecoController())->getIDCidadeByNome($imovel->Location->City) ?? '5103403';
                $endereco->cep_endereco = Helper::limpa_campo($imovel->Location->PostalCode ?? '78000000');
                $endereco->logradouro_endereco = $imovel->Location->Address ?? 'Av. do CPA';
                $endereco->numero_endereco = $imovel->Location->StreetNumber ?? '100';
                $endereco->complemento_endereco = 'Complemento';
                $endereco->bairro_endereco = $imovel->Location->Neighborhood ?? 'Centro';

                $endereco->save();

                $anuncio = new Anuncio();
                $anuncio->finalidade = (New AnuncioFinalidadeController())->GetFinalidadeByTipo($imovel->Details->PropertyType);
                $anuncio->tipo_publicacao = $this->GetTipoByPublicationType($imovel->PublicationType);
                $anuncio->tipo_id = (New AnuncioTipoController())->GetIDTipoByNome($imovel->Details->PropertyType);
                $anuncio->anunciante_id = $anunciante_id;
                $anuncio->endereco_id = $endereco->id;
                $anuncio->transacao = $this->GetTransacaoByTransactionType($imovel->TransactionType);
                $anuncio->id_externo = $imovel->ListingID;
                $anuncio->titulo = $imovel->Title;
                $anuncio->descricao = $imovel->Details->Description;
                $anuncio->descricao_resumida = substr($imovel->Details->Description, 0, 250);
                $anuncio->valor_venda = Helper::converte_reais_to_mysql($imovel->Details->ListPrice ?? 0.00);
                $anuncio->valor_locacao = Helper::converte_reais_to_mysql($imovel->Details->RentalPrice ?? 0.00);
                $anuncio->valor_condominio = Helper::converte_reais_to_mysql(0.00);
                $anuncio->situacao = 'Liberado';

                if($anuncio->save()){

                    foreach($imovel->Media as $foto){

                        $fotos = new AnuncioFotos();
                        $fotos->anuncio_id = $anuncio->id;
                        $fotos->titulo = $foto->Item->attributes()->caption ?? $imovel->Title;
                        $fotos->arquivo = $foto->Item;

                        if(isset($foto->Item->attributes()->primary)){
                            $fotos->destaque = 'S';
                        }else{
                            $fotos->destaque = 'N';
                        }

                        $fotos->save();
                    }

                    $tipo_log = "Sucesso";
                    $subtipo_log = "Inclusão";
                    $titulo = "Imóvel integrado com sucesso";
                    $descricao_log = "Imóvel integrado com sucesso";

                }else{
                    $tipo_log = "Erro";
                    $subtipo_log = "Inclusão";
                    $titulo = "O Imóvel não foi integrado totalmente";
                    $descricao_log = "Informações importantes estão ausentes";
                }

                (New LogIntegracaoAnuncioController())->gravaLogAnuncio($LogIntegracao->id, $imovel->ListingID, $tipo_log, $subtipo_log, $titulo, $descricao_log);

                $total_incluidos++;
            }

        }

        $logUpdate = (New LogIntegracaoController())->updateLog($LogIntegracao->id, $total_alertas, $total_incluidos, $total_alterados, $total_removidos);

        dd($logUpdate);
        if($logUpdate):
            echo "OK";
        else:
            echo "ERRO";
        endif;
    }



}
