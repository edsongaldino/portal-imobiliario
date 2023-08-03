<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AppController extends Controller
{
    public function login(){
        return view('painel.login');
    }

    public function index(){
        return view('painel.dashboard');
    }
}
