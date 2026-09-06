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
                $codigo = str_pad(rand(0, 999999), 6, '0', STR_PAD_LEFT);
                
                \Illuminate\Support\Facades\DB::table('password_resets')->updateOrInsert(
                    ['email' => $User->email],
                    [
                        'token' => Hash::make($codigo),
                        'created_at' => now()
                    ]
                );

                Mail::to(trim($User->email))->send(new ReenviarSenha($User, $codigo));
                return 'CodigoEnviado';
            } catch (\Exception $e) {
                // Returns the error string instead of failing with HTTP 500
                return 'ErroEmail: ' . $e->getMessage();
            }
        }

        return "Erro";

    }

    public function FormValidarCodigo($email){
        $email_decoded = trim(base64_decode($email));
        return view('painel.validar_codigo', compact('email', 'email_decoded'));
    }

    public function ValidarCodigo(Request $request){
        $email = trim(base64_decode($request->email));
        $codigo = trim($request->codigo);
        
        $reset = \Illuminate\Support\Facades\DB::table('password_resets')->where('email', $email)->first();
        
        if($reset && Hash::check($codigo, $reset->token)){
            session(['verified_reset_'.$email => true]);
            return redirect()->route('nova.senha', ['email' => $request->email]);
        }
        
        return back()->with('error', 'O código informado é inválido ou já expirou.');
    }

    public function FormAlterarSenha($email){
        $email_decoded = trim(base64_decode($email));
        if(!session('verified_reset_'.$email_decoded)){
            return redirect()->route('validar.codigo', ['email' => $email])->with('error', 'Você precisa confirmar o código recebido no e-mail primeiro.');
        }

        $user = User::whereRaw('TRIM(LOWER(email)) = ?', [strtolower($email_decoded)])->first();
        return view('painel.resetar_senha')->with(compact('user', 'email'));
    }

    public function AlterarSenha(Request $request){
        $user = User::find(base64_decode($request->id));

        if(!$user) {
            return "Erro";
        }

        if(!session('verified_reset_'.$user->email)){
            return "Acesso Negado: Código não validado.";
        }

        if($request->password == $request->input('confirm-password')){
            $user->password = Hash::make($request->password);
            if($user->save()){
                session()->forget('verified_reset_'.$user->email);
                \Illuminate\Support\Facades\DB::table('password_resets')->where('email', $user->email)->delete();
                Auth::login($user);
                Session::put('usuario', $user);
                return 'Sucesso';
            }else{
                return "Erro";
            }
        }
        return "Erro: Senhas não conferem";
    }
}
