<?php

namespace App\Http\Controllers;

use App\Mail\ReenviarSenha;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMailUser;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function dashboard(){

        if(Auth::check() === true){
            return view('painel.dashboard');
        }

        return redirect()->route('login-painel')->with('warning', 'Efetue Login para acessar');
    }

    public function LembrarSenha(){

        return view('lembrar');

    }

    public function Login(Request $request){

        if(!filter_var($request->email, FILTER_VALIDATE_EMAIL)){
            return redirect()->back()->with('warning', 'O e-mail não é válido!');
        }

        $credencials = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if(Auth::attempt($credencials)){
            $usuario = Auth::user();
            Session::put('usuario', $usuario);
            return "Sucesso";
        }
        return "Erro";
    }

    public function Logout(){

        Auth::logout();
        return redirect()->route('login-painel')->with('success', 'Logof Efetuado');
    }

    public function ReenviarSenha(Request $request){

        $User = User::where('email', $request->email)->first();

        if($User){

            //ENVIA PARA O USUÁRIO
            $request->template = "emails.senha";
            $request->assunto = "Você solicitou uma nova senha! Rede Imóveis MT";
            $request->destinatario = $User->email;
            $request->name = $User->name;
            $request->link = getenv('APP_URL').'/nova-senha/'.base64_encode($User->email);

            Mail::to($request->destinatario)->send(new ReenviarSenha($request));

            return 'Sucesso';
        }

        return "Erro";

    }

    public function FormAlterarSenha($email){
        $email = base64_decode($email);
        return view('nova-senha')->with(compact('email'));
    }

    public function AlterarSenha(Request $request){

        $user = User::where('email', $request->email)->first();

        if($request->senha == $request->confirmar_senha){
            $user->password = Hash::make($request->senha);
            $user->save();

            return view('home');
        }

        return redirect()->back()->with('warning', 'As senhas precisam ser idênticas.');


    }
}
