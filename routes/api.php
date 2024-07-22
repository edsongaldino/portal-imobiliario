<?php

use App\Http\Controllers\AnuncioController;
use App\Http\Controllers\LeadsController;
use App\Models\Leads;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('/leads', [LeadsController::class, 'GetLeads']);
Route::get('/anuncios', [AnuncioController::class, 'GetAnuncios']);