<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Models\Integracao;
use App\Http\Controllers\Controller;
use App\Models\Anunciante;
use App\Models\AnuncianteIntegracao;
use App\Models\Anuncio;
use App\Models\AnuncioFotos;
use App\Models\AnuncioInformacoes;
use App\Models\Endereco;
use App\Models\LogIntegracao;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
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
        $logs = LogIntegracao::where('anunciante_id',Auth::user()->anunciante->id)->orderBy('id', 'DESC')->paginate(15);

        return view('painel.integracao.relatorio_geral', compact('usuario', 'logs'));
    }

    public function RelatorioIndividual($id)
    {
        $usuario = Auth::user();
        $RelatorioGeral = LogIntegracao::find($id);
        $logs = DB::table('log_integracao_anuncios')
                ->join('anuncios', 'anuncios.id_externo', '=', 'log_integracao_anuncios.id_externo')
                ->where('log_integracao_anuncios.log_integracao_id', $id)
                ->select('log_integracao_anuncios.*', 'anuncios.titulo as tituloAnuncio')
                ->orderBy('log_integracao_anuncios.id', 'DESC')->paginate(15);

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

            if((New Anuncio())->verificaDuplicidade('id_externo', $imovel->ListingID, $anunciante_id)){

                $dadosAnuncio = Anuncio::where('id_externo',$imovel->ListingID)->first();
                $anuncio = Anuncio::find($dadosAnuncio->id);
                $anuncio->finalidade = (New AnuncioFinalidadeController())->GetFinalidadeByTipo($imovel->Details->PropertyType);
                $anuncio->tipo_publicacao = $this->GetTipoByPublicationType($imovel->PublicationType);
                $anuncio->origem_publicacao = 'Integracao';
                $anuncio->tipo_id = (New AnuncioTipoController())->GetIDTipoByNome($imovel->Details->PropertyType);
                $anuncio->anunciante_id = $anunciante_id;
                $anuncio->transacao = $this->GetTransacaoByTransactionType($imovel->TransactionType);
                $anuncio->id_externo = $imovel->ListingID;
                $anuncio->titulo = mb_strcut(addslashes($imovel->Title), 0, 100,"UTF-8");
                $anuncio->descricao = addslashes($imovel->Details->Description);
                $anuncio->descricao_resumida = mb_strcut(addslashes($imovel->Details->Description), 0, 250,"UTF-8");
                $anuncio->valor_venda = Helper::converte_reais_to_mysql($imovel->Details->ListPrice ?? 0.00);
                $anuncio->valor_locacao = Helper::converte_reais_to_mysql($imovel->Details->RentalPrice ?? 0.00);
                $anuncio->valor_condominio = Helper::converte_reais_to_mysql($imovel->Details->PropertyAdministrationFee ?? 0.00);
                $anuncio->situacao = 'Liberado';
                $anuncio->destaque = $imovel->Details->Destaque ?? 'N';
                $anuncio->lancamento = $imovel->Details->Lancamento ?? 'N';

                (New AnuncioInformacoes())->UpdateInformacao($dadosAnuncio->id, $this->GetInformacaoByFeature('LivingArea'), 'Detalhes', $imovel->Details->LivingArea ?? '0');
                (New AnuncioInformacoes())->UpdateInformacao($dadosAnuncio->id, $this->GetInformacaoByFeature('LotArea'),'Detalhes', $imovel->Details->LotArea ?? '0');
                (New AnuncioInformacoes())->UpdateInformacao($dadosAnuncio->id, $this->GetInformacaoByFeature('Buildings'),'Detalhes', $imovel->Details->Buildings ?? '0');
                (New AnuncioInformacoes())->UpdateInformacao($dadosAnuncio->id, $this->GetInformacaoByFeature('Floors'),'Detalhes', $imovel->Details->Floors ?? '0');
                (New AnuncioInformacoes())->UpdateInformacao($dadosAnuncio->id, $this->GetInformacaoByFeature('UnitFloor'),'Detalhes', $imovel->Details->UnitFloor ?? '0');
                (New AnuncioInformacoes())->UpdateInformacao($dadosAnuncio->id, $this->GetInformacaoByFeature('Bedrooms'),'Detalhes', $imovel->Details->Bedrooms ?? '0');
                (New AnuncioInformacoes())->UpdateInformacao($dadosAnuncio->id, $this->GetInformacaoByFeature('Bathrooms'),'Detalhes', $imovel->Details->Bathrooms ?? '0');
                (New AnuncioInformacoes())->UpdateInformacao($dadosAnuncio->id, $this->GetInformacaoByFeature('Suites'),'Detalhes', $imovel->Details->Suites ?? '0');
                (New AnuncioInformacoes())->UpdateInformacao($dadosAnuncio->id, $this->GetInformacaoByFeature('Garage'),'Detalhes', $imovel->Details->Garage ?? '0');
                (New AnuncioInformacoes())->UpdateInformacao($dadosAnuncio->id, $this->GetInformacaoByFeature('PropertyAdministrationFee'),'Detalhes', $imovel->Details->PropertyAdministrationFee ?? '0');
                (New AnuncioInformacoes())->UpdateInformacao($dadosAnuncio->id, $this->GetInformacaoByFeature('YearlyTax'),'Detalhes', $imovel->Details->YearlyTax ?? '0');
                (New AnuncioInformacoes())->UpdateInformacao($dadosAnuncio->id, $this->GetInformacaoByFeature('YearBuilt'),'Detalhes', $imovel->Details->YearBuilt ?? '0');

                $endereco = Endereco::find($dadosAnuncio->endereco_id);
                $endereco->cidade_id = (New EnderecoController())->getIDCidadeByNome($imovel->Location->City) ?? '5103403';
                $endereco->cep_endereco = Helper::limpa_campo($imovel->Location->PostalCode ?? '78000000');
                $endereco->logradouro_endereco = $imovel->Location->Address ?? 'Av. do CPA';
                $endereco->numero_endereco = mb_strcut($imovel->Location->StreetNumber ?? '100', 0, 10,"UTF-8");
                $endereco->complemento_endereco = 'Complemento';
                $endereco->bairro_endereco = $imovel->Location->Neighborhood ?? 'Centro';
                $endereco->save();

                if($anuncio->save()){

                    foreach($imovel->Features as $Itens){
                        (New AnuncioInformacoes())->DeletaInformacao($anuncio->id, $this->GetInformacaoByFeature($Itens->Feature));
                        (New AnuncioInformacoes())->GravaInformacao($anuncio->id, $this->GetInformacaoByFeature($Itens->Feature), 'Características', 'Sim');
                    }

                    $fotos_anuncio = AnuncioFotos::where('anuncio_id', $anuncio->id)->get();
                    if($fotos_anuncio->count() > 0){
                        AnuncioFotos::where('anuncio_id', $anuncio->id)->delete();
                    }

                    foreach($imovel->Media->Item as $foto){

                        if(isset($foto->Item->attributes()->medium)){
                            if($foto->Item->attributes()->medium == "video"){
                                (New AnuncioInformacoes())->GravaInformacao($anuncio->id, 'Vídeo','Detalhes', $foto->Item);
                            }
                        }else{
                            $fotos = new AnuncioFotos();
                            $fotos->anuncio_id = $anuncio->id;
                            $fotos->titulo = mb_strcut($foto->Item->attributes()->caption ?? $imovel->Title, 0, 50,"UTF-8");
                            $fotos->arquivo = $foto;

                            if(isset($foto->attributes()->primary)){
                                $fotos->destaque = 'S';
                            }else{
                                $fotos->destaque = 'N';
                            }

                            $fotos->save();
                        }

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
                $endereco->numero_endereco = mb_strcut($imovel->Location->StreetNumber ?? '100', 0, 10,"UTF-8");
                $endereco->complemento_endereco = 'Complemento';
                $endereco->bairro_endereco = $imovel->Location->Neighborhood ?? 'Centro';
                $endereco->save();

                $anuncio = new Anuncio();
                $anuncio->finalidade = (New AnuncioFinalidadeController())->GetFinalidadeByTipo($imovel->Details->PropertyType);
                $anuncio->tipo_publicacao = $this->GetTipoByPublicationType($imovel->PublicationType);
                $anuncio->origem_publicacao = 'Integracao';
                $anuncio->tipo_id = (New AnuncioTipoController())->GetIDTipoByNome($imovel->Details->PropertyType);
                $anuncio->anunciante_id = $anunciante_id;
                $anuncio->endereco_id = $endereco->id;
                $anuncio->transacao = $this->GetTransacaoByTransactionType($imovel->TransactionType);
                $anuncio->id_externo = $imovel->ListingID;
                $anuncio->titulo = mb_strcut(addslashes($imovel->Title), 0, 100,"UTF-8");
                $anuncio->descricao = addslashes($imovel->Details->Description);
                $anuncio->descricao_resumida = mb_strcut(addslashes($imovel->Details->Description), 0, 250,"UTF-8");
                $anuncio->valor_venda = Helper::converte_reais_to_mysql($imovel->Details->ListPrice ?? 0.00);
                $anuncio->valor_locacao = Helper::converte_reais_to_mysql($imovel->Details->RentalPrice ?? 0.00);
                $anuncio->valor_condominio = Helper::converte_reais_to_mysql($imovel->Details->PropertyAdministrationFee ?? 0.00);
                $anuncio->situacao = 'Liberado';
                $anuncio->destaque = $imovel->Details->Destaque ?? 'N';
                $anuncio->lancamento = $imovel->Details->Lancamento ?? 'N';

                if($anuncio->save()){

                    (New AnuncioInformacoes())->GravaInformacao($anuncio->id, $this->GetInformacaoByFeature('LivingArea'),'Detalhes', $imovel->Details->LivingArea ?? '0');
                    (New AnuncioInformacoes())->GravaInformacao($anuncio->id, $this->GetInformacaoByFeature('LotArea'),'Detalhes', $imovel->Details->LotArea ?? '0');
                    (New AnuncioInformacoes())->GravaInformacao($anuncio->id, $this->GetInformacaoByFeature('Buildings'),'Detalhes', $imovel->Details->Buildings ?? '0');
                    (New AnuncioInformacoes())->GravaInformacao($anuncio->id, $this->GetInformacaoByFeature('Floors'),'Detalhes', $imovel->Details->Floors ?? '0');
                    (New AnuncioInformacoes())->GravaInformacao($anuncio->id, $this->GetInformacaoByFeature('UnitFloor'),'Detalhes', $imovel->Details->UnitFloor ?? '0');
                    (New AnuncioInformacoes())->GravaInformacao($anuncio->id, $this->GetInformacaoByFeature('Bedrooms'), 'Detalhes',$imovel->Details->Bedrooms ?? '0');
                    (New AnuncioInformacoes())->GravaInformacao($anuncio->id, $this->GetInformacaoByFeature('Bathrooms'),'Detalhes', $imovel->Details->Bathrooms ?? '0');
                    (New AnuncioInformacoes())->GravaInformacao($anuncio->id, $this->GetInformacaoByFeature('Suites'),'Detalhes', $imovel->Details->Suites ?? '0');
                    (New AnuncioInformacoes())->GravaInformacao($anuncio->id, $this->GetInformacaoByFeature('Garage'),'Detalhes', $imovel->Details->Garage ?? '0');
                    (New AnuncioInformacoes())->GravaInformacao($anuncio->id, $this->GetInformacaoByFeature('PropertyAdministrationFee'),'Detalhes', $imovel->Details->PropertyAdministrationFee ?? '0');
                    (New AnuncioInformacoes())->GravaInformacao($anuncio->id, $this->GetInformacaoByFeature('YearlyTax'),'Detalhes', $imovel->Details->YearlyTax ?? '0');
                    (New AnuncioInformacoes())->GravaInformacao($anuncio->id, $this->GetInformacaoByFeature('YearBuilt'),'Detalhes', $imovel->Details->YearBuilt ?? '0');

                    foreach($imovel->Features as $Itens){
                        (New AnuncioInformacoes())->GravaInformacao($anuncio->id, $this->GetInformacaoByFeature($Itens->Feature), 'Características', 'Sim');
                    }

                    foreach($imovel->Media as $foto){

                        if(isset($foto->Item->attributes()->medium)){
                            if($foto->Item->attributes()->medium == "video"){
                                dd($foto->Item->attributes()->medium);
                                (New AnuncioInformacoes())->GravaInformacao($anuncio->id, 'Vídeo','Detalhes', $foto->Item);
                            }
                        }else{
                            $fotos = new AnuncioFotos();
                            $fotos->anuncio_id = $anuncio->id;
                            $fotos->titulo = mb_strcut($foto->Item->attributes()->caption ?? $imovel->Title, 0, 50,"UTF-8");
                            $fotos->arquivo = $foto->Item;

                            if(isset($foto->Item->attributes()->primary)){
                                $fotos->destaque = 'S';
                            }else{
                                $fotos->destaque = 'N';
                            }

                            $fotos->save();
                        }
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

            $ArrayImportacaoAnuncios[] = $imovel->ListingID;

        }

        $logoUpdate = (New LogIntegracaoController())->updateLog($LogIntegracao->id, $total_alertas, $total_incluidos, $total_alterados, $total_removidos);

        foreach($anunciante->anuncios as $anuncio){
            if (!in_array($anuncio->id_externo, $ArrayImportacaoAnuncios)) {
                Anuncio::where('id_externo', $anuncio->id_externo)->update(['situacao' => 'Bloqueado']);
            }
        }


        if($logoUpdate){
            return true;
        }else{
            return false;
        }

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

    public function GetInformacaoByFeature($Feature){
        switch($Feature){
            case 'Gym':
                $chave = 'Academia';
                break;
            case 'BBQ':
                $chave = 'Churrasqueira';
                break;
            case 'Elevator':
                $chave = 'Elevador';
                break;
            case 'Pool':
                $chave = 'Piscina';
                break;
            case 'Playground':
                $chave = 'Playground';
                break;
            case 'Party Room':
                $chave = 'Salão de festas';
                break;
            case 'Kitchen':
                $chave = 'Cozinha';
                break;
            case 'Edicule':
                $chave = 'Edícula';
                break;
            case 'Parking Garage':
                $chave = 'Estacionamento';
                break;
            case 'Dinner Room':
                $chave = 'Sala de jantar';
                break;
            case 'Internet Connection':
                $chave = 'Internet';
                break;
            case 'Sports Court':
                $chave = 'Quadra de esportes';
                break;
            case 'Garden':
                $chave = 'Jardim';
                break;
            case 'Dinner Room':
                $chave = 'Sala de jantar';
                break;
            case 'LivingArea':
                $chave = 'Área Útil';
                break;
            case 'LotArea':
                $chave = 'Área de lote';
                break;
            case 'Buildings':
                $chave = 'Torres';
                break;
            case 'Andar':
                $chave = 'Quadra de esportes';
                break;
            case 'UnitFloor':
                $chave = 'Pavimentos';
                break;
            case 'Bedrooms':
                $chave = 'Quartos';
                break;
            case 'Bathrooms':
                $chave = 'Banheiros';
                break;
            case 'Suites':
                $chave = 'Suites';
                break;
            case 'Garage':
                $chave = 'Garagem';
                break;
            case 'PropertyAdministrationFee':
                $chave = 'Condomínio';
                break;
            case 'YearlyTax':
                $chave = 'IPTU';
                break;
            case 'YearBuilt':
                $chave = 'Ano/Construção';
                break;

            default:
                $chave = '-';
                break;
        }
        return $chave;
    }

    public function LerXML(){

        ini_set('max_execution_time', 920);

        $anunciante = Anunciante::find(1);
        $xml = $anunciante->integracao->first()->url;

        //se o caminho esteja hospedado noutro servidor
        $url = "https://rosaimoveis.com.br/index.php?option=com_widesys&task=Integrations.getData&source=Portalgrupozap4&format=xml&token=c472d3a24399206626cae864eab8c4fb";

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

            if((New Anuncio())->verificaDuplicidade('id_externo', $imovel->ListingID, $anunciante_id)){

                $dadosAnuncio = Anuncio::where('id_externo',$imovel->ListingID)->first();
                $anuncio = Anuncio::find($dadosAnuncio->id);
                $anuncio->finalidade = (New AnuncioFinalidadeController())->GetFinalidadeByTipo($imovel->Details->PropertyType);
                $anuncio->tipo_publicacao = $this->GetTipoByPublicationType($imovel->PublicationType);
                $anuncio->tipo_id = (New AnuncioTipoController())->GetIDTipoByNome($imovel->Details->PropertyType);
                $anuncio->anunciante_id = $anunciante_id;
                $anuncio->transacao = $this->GetTransacaoByTransactionType($imovel->TransactionType);
                $anuncio->id_externo = $imovel->ListingID;
                $anuncio->titulo = mb_strcut(addslashes($imovel->Title), 0, 100,"UTF-8");
                $anuncio->descricao = addslashes($imovel->Details->Description);
                $anuncio->descricao_resumida = mb_strcut(addslashes($imovel->Details->Description), 0, 250,"UTF-8");
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
                $endereco->numero_endereco = mb_strcut($imovel->Location->StreetNumber ?? '100', 0, 10,"UTF-8");
                $endereco->complemento_endereco = 'Complemento';
                $endereco->bairro_endereco = $imovel->Location->Neighborhood ?? 'Centro';

                if($endereco->save()){
                    echo "Endereço Salvo";
                }else{
                    echo "Erro Salvar Endereço";
                }

                if($anuncio->save()){

                    echo "Anuncio Salvo".$anuncio->id;

                    $fotos_anuncio = AnuncioFotos::where('anuncio_id', $anuncio->id)->get();
                    if($fotos_anuncio->count() > 0){
                        AnuncioFotos::where('anuncio_id', $anuncio->id)->delete();
                    }else{
                        echo "Mão encontrei imagem";
                    }


                    if($imovel->Media->Item->count() > 0){

                        if($imovel->ListingID == 'CA5075'){
                            foreach($imovel->Media->Item as $foto){

                                $fotos = new AnuncioFotos();
                                $fotos->anuncio_id = $anuncio->id;
                                $fotos->titulo = "Teste";
                                $fotos->arquivo = $foto;

                                if(isset($foto->attributes()->primary)){
                                    $fotos->destaque = 'S';
                                }else{
                                    $fotos->destaque = 'N';
                                }

                                if($fotos->save()){
                                    echo "Fotos Salva ID".$fotos->id;
                                }else{
                                    echo "Errro ao salvar foto";
                                }
                            }
                        }else{
                            foreach($imovel->Media->Item as $foto){

                                $fotos = new AnuncioFotos();
                                $fotos->anuncio_id = $anuncio->id;
                                $fotos->titulo = mb_strcut($foto->Item->attributes()->caption ?? $imovel->Title, 0, 50,"UTF-8");
                                $fotos->arquivo = $foto;

                                if(isset($foto->attributes()->primary)){
                                    $fotos->destaque = 'S';
                                }else{
                                    $fotos->destaque = 'N';
                                }

                                if($fotos->save()){
                                    echo "Fotos Salva ID".$fotos->id;
                                }else{
                                    echo "Errro ao salvar foto";
                                }
                            }
                        }


                    }else{
                        echo "Mão existe imagem";
                    }



                    $tipo_log = "Sucesso";
                    $subtipo_log = "Atualização";
                    $titulo = "Imóvel atualizado com sucesso";
                    $descricao_log = "Imóvel atualizado com sucesso";

                    echo "Anuncio Salvo";

                }else{
                    $tipo_log = "Erro";
                    $subtipo_log = "Atualização";
                    $titulo = "O Imóvel não foi atualizado totalmente";
                    $descricao_log = "Informações importantes estão ausentes";

                    echo "Erro ao Salvar Anúncio";
                }

                $log = (New LogIntegracaoAnuncioController())->gravaLogAnuncio($LogIntegracao->id, $imovel->ListingID, $tipo_log, $subtipo_log, $titulo, $descricao_log);
                $total_alterados++;

                if($log){
                    echo "LOG Salva".$log->id;
                }else{
                    echo "Errro ao salvar LOG";
                }

            }else{

                $endereco = new Endereco();
                $endereco->cidade_id = (New EnderecoController())->getIDCidadeByNome($imovel->Location->City) ?? '5103403';
                $endereco->cep_endereco = Helper::limpa_campo($imovel->Location->PostalCode ?? '78000000');
                $endereco->logradouro_endereco = $imovel->Location->Address ?? 'Av. do CPA';
                $endereco->numero_endereco = mb_strcut($imovel->Location->StreetNumber ?? '100', 0, 10, "UTF-8");
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
                $anuncio->titulo = mb_strcut(addslashes($imovel->Title), 0, 100,"UTF-8");
                $anuncio->descricao = addslashes($imovel->Details->Description);
                $anuncio->descricao_resumida = mb_strcut(addslashes($imovel->Details->Description), 0, 250, "UTF-8");
                $anuncio->valor_venda = Helper::converte_reais_to_mysql($imovel->Details->ListPrice ?? 0.00);
                $anuncio->valor_locacao = Helper::converte_reais_to_mysql($imovel->Details->RentalPrice ?? 0.00);
                $anuncio->valor_condominio = Helper::converte_reais_to_mysql(0.00);
                $anuncio->situacao = 'Liberado';

                if($anuncio->save()){

                    foreach($imovel->Media as $foto){

                        $fotos = new AnuncioFotos();
                        $fotos->anuncio_id = $anuncio->id;
                        $fotos->titulo = mb_strcut($foto->Item->attributes()->caption ?? $imovel->Title, 0, 50,"UTF-8");
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

        if($logUpdate):
            echo "OK";
        else:
            echo "ERRO";
        endif;
    }



}
