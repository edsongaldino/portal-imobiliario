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

        return redirect()->route('login')->with('warning', 'Efetue Login para acessar');
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
            if ($usuario->perfil_id == 4) {
                Auth::logout();
                Session::forget('usuario');
                return "NaoPermitido";
            }
            Session::put('usuario', $usuario);
            return "Sucesso";
        }
        return "Erro";
    }

    public function Logout(){

        Auth::logout();
        return redirect()->route('login')->with('success', 'Logof Efetuado');
    }

    public function ReenviarSenha(Request $request){

        $email = trim($request->email);
        $User = User::whereRaw('TRIM(LOWER(email)) = ?', [strtolower($email)])->first();

        if($User){
            try {
                $link = url('/nova-senha/'.base64_encode(trim($User->email)));
                Mail::to(trim($User->email))->send(new ReenviarSenha($User, $link));
                return 'Sucesso';
            } catch (\Exception $e) {
                // Returns the error string instead of failing with HTTP 500
                return 'ErroEmail: ' . $e->getMessage();
            }
        }

        return "Erro";

    }

    public function FormAlterarSenha($email){
        $email = trim(base64_decode($email));
        $user = User::whereRaw('TRIM(LOWER(email)) = ?', [strtolower($email)])->first();
        return view('painel.resetar_senha')->with(compact('user'));
    }

    public function AlterarSenha(Request $request){

        $user = User::find(base64_decode($request->id));

        if($request->senha == $request->confirmar_senha){
            $user->password = Hash::make($request->senha);
            if($user->save()){
                return 'Sucesso';
            }else{
                return "Erro";
            }
        }

        return "Erro";
    }
}
