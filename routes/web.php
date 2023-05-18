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

Route::get('/', function () {
    return view('sistema.dashboard');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/cadastro', function () {
    return view('cadastro');
});

Route::get('/lembrar-senha', function () {
    return view('lembrar_senha');
});

Route::get('/resetar-senha', function () {
    return view('resetar_senha');
});

Route::get('/login-duas-etapas', function () {
    return view('duas_etapas');
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
