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

Route::get('/', function () {
    return view('portal.index');
});

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

Route::match(['get', 'post'],'imoveis-buscar', function () {
    return view('portal.lista');
});

//Rotas Admin / Painel
Route::get('/dashboard', 'App\Http\Controllers\AppController@index')->name('dashboard')->middleware('auth');
Route::post('/finalizar-cadastro', 'App\Http\Controllers\AnuncianteController@CadastrarAnunciante')->name('finalizar-cadastro');
Route::post('/login-painel', 'App\Http\Controllers\AuthController@Login')->name('login-painel');
Route::get('/painel/anuncios', 'App\Http\Controllers\AnuncioController@index')->name('painel.anuncios')->middleware('auth');
Route::get('/painel/anuncios/incluir', 'App\Http\Controllers\AnuncioController@create')->name('painel.anuncios.incluir')->middleware('auth');

?>
