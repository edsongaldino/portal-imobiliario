<?php

use App\Http\Controllers\LeadsController;
use App\Models\Leads;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('/leads', [LeadsController::class, 'GetLeads']);
Route::get('/anuncios', 'App\Http\Controllers\AnuncioController@GetAnuncios')->name('anuncios');
Route::get('/estados', 'App\Http\Controllers\AnuncioController@GetEstados')->name('estados');