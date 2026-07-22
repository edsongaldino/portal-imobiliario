<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Laravel\Socialite\Facades\Socialite;

class PortalAuthController extends Controller
{
    /**
     * Handle client login request.
     */
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator, 'login')
                ->withInput();
        }

        $credentials = $request->only('email', 'password');
        $remember = $request->has('remember');

        if (Auth::attempt($credentials, $remember)) {
            $request->session()->regenerate();
            
            $user = Auth::user();
            if ($user->perfil_id == 4) {
                return redirect()->intended('/imoveis-favoritos');
            }
            
            return redirect()->intended('/dashboard');
        }

        return redirect()->back()
            ->withInput($request->only('email', 'remember'))
            ->withErrors([
                'email' => 'As credenciais informadas não coincidem com nossos registros.',
            ], 'login');
    }

    /**
     * Handle client registration request.
     */
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator, 'register')
                ->withInput();
        }

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->perfil_id = 4; // Cliente
        $user->save();

        Auth::login($user);

        return redirect()->route('imoveis-favoritos')->with('success', 'Cadastro realizado com sucesso!');
    }

    /**
     * Redirect the user to the Google authentication page.
     */
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Obtain the user information from Google.
     */
    public function handleGoogleCallback()
    {
        try {
            $googleUser = Socialite::driver('google')->user();
        } catch (\Exception $e) {
            return redirect()->route('login.portal')->with('error', 'Falha ao autenticar com o Google. Tente novamente.');
        }

        // Check if user already exists by google_id
        $user = User::where('google_id', $googleUser->getId())->first();

        if (!$user) {
            // Check if user already exists by email
            $user = User::where('email', $googleUser->getEmail())->first();

            if ($user) {
                // Link Google account to existing user
                $user->google_id = $googleUser->getId();
                $user->save();
            } else {
                // Register new user
                $user = new User();
                $user->name = $googleUser->getName() ?? 'Usuário Google';
                $user->email = $googleUser->getEmail();
                $user->google_id = $googleUser->getId();
                $user->perfil_id = 4; // Cliente
                $user->password = null;
                $user->save();
            }
        }

        Auth::login($user);

        return redirect()->route('imoveis-favoritos')->with('success', 'Autenticado com o Google com sucesso!');
    }

    /**
     * Handle portal logout.
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('success', 'Você saiu com sucesso.');
    }

    /**
     * Handle portal password reset.
     */
    public function resetPassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator, 'reset')
                ->withInput();
        }

        $email = trim($request->email);
        $user = User::whereRaw('TRIM(LOWER(email)) = ?', [strtolower($email)])->first();

        if ($user) {
            try {
                $link = url('/nova-senha/'.base64_encode(trim($user->email)));
                \Illuminate\Support\Facades\Mail::to(trim($user->email))->send(new \App\Mail\ReenviarSenha($user, $link));
                
                return redirect()->back()->with('status', 'Email de redefinição enviado com sucesso! Verifique sua caixa de entrada.');
            } catch (\Exception $e) {
                return redirect()->back()->withErrors(['email' => 'Erro ao enviar o e-mail: ' . $e->getMessage()], 'reset')->withInput();
            }
        }

        return redirect()->back()->withErrors(['email' => 'Ops, não foi possível encontrar um usuário com este e-mail!'], 'reset')->withInput();
    }
}
