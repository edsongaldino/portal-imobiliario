<?php

use App\Http\Controllers\IntegracaoController;
use Illuminate\Contracts\Routing\UrlGenerator;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/integracao-xml', [IntegracaoController::class, 'LerXML']);

Route::get('/login', function () {
    return view('painel.login');
});

Route::get('/cadastro', function () {
    return view('painel.cadastro');
});

Route::get('/lembrar-senha', function () {
    return view('painel.lembrar_senha');
});

Route::get('/resetar-senha', function () {
    return view('painel.resetar_senha');
});

Route::get('/login-duas-etapas', function () {
    return view('painel.duas_etapas');
});

Route::get('/portal-imobiliario', function () {
    return view('portal.index');
});

Route::get('detalhes-imovel', function () {
    return view('portal.detalhes');
});


//Rotas Admin / Painel
Route::get('/login', 'App\Http\Controllers\AppController@login')->name('login');
Route::get('/dashboard', 'App\Http\Controllers\AppController@index')->name('dashboard')->middleware('auth');
Route::post('/finalizar-cadastro', 'App\Http\Controllers\AnuncianteController@CadastrarAnunciante')->name('finalizar-cadastro');
Route::post('/login-painel', 'App\Http\Controllers\AuthController@Login')->name('login-painel');
Route::post('/reenviar-senha', 'App\Http\Controllers\AuthController@ReenviarSenha')->name('lembrar-senha');
Route::get('/nova-senha/{email}', 'App\Http\Controllers\AuthController@FormAlterarSenha')->name('nova.senha');
Route::post('/senha/alterar', 'App\Http\Controllers\AuthController@AlterarSenha')->name('alterar.senha');
Route::get('/logout-painel', 'App\Http\Controllers\AuthController@Logout')->name('logout-painel')->middleware('auth');
Route::get('/painel/anuncios', 'App\Http\Controllers\AnuncioController@index')->name('painel.anuncios')->middleware('auth');
Route::get('/painel/anuncios/incluir', 'App\Http\Controllers\AnuncioController@create')->name('painel.anuncios.incluir')->middleware('auth');
Route::get('/painel/anuncios/{id}/editar', 'App\Http\Controllers\AnuncioController@edit')->name('painel.anuncios.editar')->middleware('auth');
Route::get('/anunciante/{id}/logo', 'App\Http\Controllers\AnuncianteController@getLogo');
Route::get('/anunciante/{id}/confirmar-cadastro/{email}', 'App\Http\Controllers\AnuncianteController@ValidarCadastro');

Route::get('/painel/{id}/perfil', 'App\Http\Controllers\UserController@edit')->name('painel.perfil')->middleware('auth');
Route::post('/painel/perfil-salvar', 'App\Http\Controllers\AnuncianteController@update')->name('painel.perfil.salvar')->middleware('auth');
Route::post('/painel/dados-acesso-salvar', 'App\Http\Controllers\UserController@update')->name('dados-acesso.salvar')->middleware('auth');

Route::get('/painel/leads', 'App\Http\Controllers\LeadsController@index')->name('painel.leads')->middleware('auth');
Route::get('/painel/integracoes/configuracao', 'App\Http\Controllers\IntegracaoController@Configuracao')->name('painel.integracoes.configuracao')->middleware('auth');
Route::post('/painel/integracao-salvar', 'App\Http\Controllers\IntegracaoController@salvarDados')->name('integracao.salvar')->middleware('auth');
Route::get('/painel/integracoes/relatorio-geral', 'App\Http\Controllers\IntegracaoController@RelatorioGeral')->name('painel.integracoes.relatorio-geral')->middleware('auth');
Route::get('/painel/integracoes/{id}/relatorio-importacao', 'App\Http\Controllers\IntegracaoController@RelatorioIndividual')->name('painel.integracoes.relatorio-importacao')->middleware('auth');
Route::post('/painel/integracao/processar-xml', 'App\Http\Controllers\IntegracaoController@ProcessarXML')->name('integracao.processar-xml')->middleware('auth');

//Rotas Portal
Route::match(['get', 'post'],'/imoveis-buscar', 'App\Http\Controllers\AnuncioController@BuscaAnuncios')->name('imoveis.buscar');
Route::get('/imoveis/{id}/{cidade}/{titulo}', 'App\Http\Controllers\AnuncioController@DetalhesAnuncio')->name('imoveis.detalhes');
Route::get('/', 'App\Http\Controllers\AppController@PaginaInicial')->name('pagina-inicial');
Route::match(['get', 'post'],'/lista-imoveis/{transacao}', 'App\Http\Controllers\AnuncioController@ListaAnuncios')->name('lista-imoveis');
Route::post('/contato-anuncio', 'App\Http\Controllers\LeadsController@store')->name('contato.anuncio');
Route::get('/painel/integracao/ler-xml', 'App\Http\Controllers\IntegracaoController@LerXML')->name('integracao.ler-xml');
Route::get('/simular-financiamento-de-imoveis', 'App\Http\Controllers\AppController@Financiamento')->name('simular-financiamento-de-imoveis');
Route::get('/rede-imoveis-mt', 'App\Http\Controllers\AppController@RedeImoveis')->name('rede-imoveis-mt');
Route::get('/rede-imoveis-mt/como-anunciar', 'App\Http\Controllers\AppController@ComoAnunciar')->name('rede-imoveis-mt/como-anunciar');
Route::get('/rede-imoveis-mt/termos-de-uso', 'App\Http\Controllers\AppController@TermosDeUso')->name('rede-imoveis-mt/termos-de-uso');
Route::get('/mapa-do-site', 'App\Http\Controllers\AppController@MapaDoSite')->name('mapa-do-site');
Route::get('/imoveis-favoritos', 'App\Http\Controllers\AppController@ImoveisFavoritos')->name('imoveis-favoritos');

Route::match(['get', 'post'],'/lista-imoveis/{id}/{anunciante}', 'App\Http\Controllers\AnuncioController@ListaAnunciosByAnunciante')->name('lista-imoveis-anunciante');
?>
