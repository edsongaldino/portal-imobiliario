<?php

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
Route::get('/dashboard', function () {
    return view('painel.dashboard');
});

Route::get('/painel/anuncios', function () {
    return view('painel.anuncios.lista');
});

Route::get('/painel/anuncios/incluir', function () {
    return view('painel.anuncios.incluir');
});


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

Route::post('imoveis-buscar', function () {
    return view('portal.lista');
});

?>
