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
use PhpParser\Node\Expr\Cast\Array_;
use PhpParser\Node\Expr\Cast\Object_;
use stdClass;

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

            $configuracoes = new stdClass;
            //ENVIA PARA O USUÁRIO
            $configuracoes->template = "emails.senha";
            $configuracoes->assunto = "Você solicitou uma nova senha! Rede Imóveis MT";
            $configuracoes->destinatario = $User->email;
            $configuracoes->name = $User->name;
            $configuracoes->link = getenv('APP_URL').'/nova-senha/'.base64_encode($User->email);

            Mail::to($configuracoes->destinatario)->send(new ReenviarSenha($configuracoes));

            return 'Sucesso';
        }

        return "Erro";

    }

    public function FormAlterarSenha($email){
        $email = base64_decode($email);
        return view('painel.resetar_senha')->with(compact('email'));
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
