<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\AnuncioTipo;
use Illuminate\Http\Request;

class AppController extends Controller
{
    public function login(){
        return view('painel.login');
    }

    public function index(){
        return view('painel.dashboard');
    }

    public function PaginaInicial(){
        $tipos = AnuncioTipo::all();
        return view('portal.index', compact('tipos'));
    }
}
