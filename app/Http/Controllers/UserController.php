<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\Helper;
use App\Models\Anunciante;
use App\Models\Cidade;
use App\Models\Estado;
use App\Models\User;
use App\Models\Perfil;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarios = User::where('perfil_id','<>', '4')->paginate(10);
        $perfis = Perfil::all();
        return view('sistema.usuarios.index', compact('usuarios', 'perfis'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $perfis = Perfil::all();
        return view('sistema.usuarios.adicionar', compact('perfis'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($this->verificaDuplicidade('email', $request->email)){
            return redirect()->back()->with('warning', 'Este e-mail ja está cadastrado! Verifique.');
        }

        $User = new User();
        $User->perfil_id = $request->perfil_id;
        $User->nome = $request->nome;
        $User->email = $request->email;
        $User->data_nascimento = Helper::data_mysql($request->data_nascimento);
        $User->telefone = Helper::limpa_campo($request->telefone);
        $User->password = Hash::make($request->password);
        $User->save();

        return redirect()->route('sistema.usuarios')->with('success', 'Dados Cadastrados! Faça seu login.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $usuario = User::find($id);
        $anunciante = Anunciante::find($usuario->anunciante_id);
        $perfis = Perfil::all();
        $estados = Estado::all();
        $cidades = Cidade::all();
        return view('painel.meu_perfil', compact('usuario', 'perfis', 'estados', 'cidades', 'anunciante'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $User = User::findOrFail($request->id);

        if($request->email <> $User->email){
            if($this->verificaDuplicidade('email', $request->email)){
                return redirect()->back()->with('warning', 'Você não pode alterar seu cadastro para este e-mail, pois ele já consta em nosso banco de dados! Verifique.');
            }
        }

        $User->perfil_id = $request->perfil_id;
        $User->name = $request->nome;
        $User->email = $request->email;
        //$User->data_nascimento = Helper::data_mysql($request->data_nascimento);
        //$User->telefone = Helper::limpa_campo($request->telefone);

        if($request->password){
            if($request->password <> $request->password2){
                return redirect()->back()->with('warning', 'As duas senhas precisam ser idênticas! Verifique.');
            }
            $User->password = Hash::make($request->password);
        }
        $User->save();

        return redirect()->route('dashboard')->with('success', 'Dados atualizados!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $usuario = User::findOrFail($request->id);
        if($usuario->delete()):
            return true;
        endif;
    }

    public function getFoto($id)
    {
        $this->user = User::find($id);
        $arquivo = Storage::get($this->user->foto);
        return $arquivo;
    }


    public function verificaDuplicidade($campo, $valor){

        $User = User::where($campo, $valor)->first();

        if(isset($User)){
            return $User;
        }else{
            return false;
        }
    }

    public function salvarUsuario(Request $request){

        $User = new User();
        $User->perfil_id = $request->perfil_id;
        $User->nome = $request->nome;
        $User->email = $request->email;
        $User->data_nascimento = Helper::data_mysql($request->data_nascimento);
        $User->telefone = Helper::limpa_campo($request->telefone);

        if($request->password){
            if($request->password <> $request->password2){
                return redirect()->back()->with('warning', 'As duas senhas precisam ser idênticas! Verifique.');
            }
            $User->password = Hash::make($request->password);
        }
        $User->save();

        return $User;
    }

    public function gerarUsuario(Request $request){

        $User = new User();
        $User->perfil_id = 4;
        $User->nome = $request->nome;
        $User->email = $request->email;
        $User->data_nascimento = $request->data_nascimento;
        $User->telefone = Helper::limpa_campo($request->telefone);
        $User->password = Hash::make($request->cpf);

        $User->save();

        return $User;
    }

    public function updateUsuario(Request $request, $id){

        $User = User::findOrFail($id);
        $User->perfil_id = $request->perfil_id;
        $User->nome = $request->nome;
        $User->email = $request->email;
        $User->data_nascimento = Helper::data_mysql($request->data_nascimento);
        $User->telefone = Helper::limpa_campo($request->telefone);

        if($request->password){
            if($request->password <> $request->password2){
                return redirect()->back()->with('warning', 'As duas senhas precisam ser idênticas! Verifique.');
            }
            $User->password = Hash::make($request->password);
        }
        $User->save();

        return $User;
    }

    public function UserBusca(Request $request)
    {
        $perfis = Perfil::all();
        $buscaUsers = User::where('perfil_id','<>', '4');

        if($request->nome){
            $buscaUsers->where('nome', 'like', '%' . $request->nome . '%');
        }

        if($request->perfil){
            $buscaUsers->where('perfil_id', $request->perfil);
        }

        if($request->cpf){
            $cpf = Helper::limpa_campo($request->cpf);
            $buscaUsers->where('cpf', $cpf);
        }

        $usuarios = $buscaUsers->paginate(20);

        return view('sistema.usuarios.index', compact('usuarios', 'perfis'));
    }

    /**
     * Lista usuários do sistema no painel administrativo.
     */
    public function gestaoUsuarios(Request $request)
    {
        if (!Auth::check() || Auth::user()->perfil_id != 1) {
            return redirect('/dashboard')->with('error', 'Acesso negado.');
        }

        $query = User::with(['perfil', 'anunciante']);

        if ($request->filled('busca')) {
            $busca = $request->busca;
            $query->where(function($q) use ($busca) {
                $q->where('name', 'like', "%{$busca}%")
                  ->orWhere('email', 'like', "%{$busca}%");
            });
        }

        if ($request->filled('perfil_id')) {
            $query->where('perfil_id', $request->perfil_id);
        }

        if ($request->filled('anunciante_id')) {
            $query->where('anunciante_id', $request->anunciante_id);
        }

        $perPage = $request->input('per_page', 10);
        $usuarios = $query->orderBy('id', 'desc')->paginate($perPage);

        $perfis = Perfil::all();
        $anunciantes = Anunciante::whereNull('deleted_at')->orderBy('nome', 'asc')->get();

        $filtrosAtivos = 0;
        if ($request->filled('busca')) $filtrosAtivos++;
        if ($request->filled('perfil_id')) $filtrosAtivos++;
        if ($request->filled('anunciante_id')) $filtrosAtivos++;

        return view('painel.usuarios.index', compact('usuarios', 'perfis', 'anunciantes', 'filtrosAtivos', 'request'));
    }

    /**
     * Salva ou atualiza um usuário (admin/anunciante) no painel.
     */
    public function gestaoSalvarUsuario(Request $request)
    {
        if (!Auth::check() || Auth::user()->perfil_id != 1) {
            return redirect('/dashboard')->with('error', 'Acesso negado.');
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'perfil_id' => 'required',
        ]);

        if ($request->perfil_id != 1 && !$request->filled('anunciante_id')) {
            return redirect()->back()->with('warning', 'Ao selecionar o perfil de Imobiliária, é obrigatório selecionar a Imobiliária vinculada!');
        }

        if ($request->filled('id')) {
            $user = User::findOrFail($request->id);
            if ($user->email != $request->email && User::where('email', $request->email)->exists()) {
                return redirect()->back()->with('warning', 'Este e-mail já está em uso por outro usuário.');
            }
        } else {
            if (User::where('email', $request->email)->exists()) {
                return redirect()->back()->with('warning', 'Este e-mail já está em uso.');
            }
            $request->validate(['password' => 'required|min:6']);
            $user = new User();
        }

        $user->name = $request->name;
        $user->email = $request->email;
        $user->perfil_id = $request->perfil_id;
        $user->anunciante_id = $request->anunciante_id ?: null;

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect()->back()->with('success', 'Usuário gravado com sucesso!');
    }

    /**
     * Altera a senha de qualquer usuário diretamente pelo admin.
     */
    public function gestaoAlterarSenha(Request $request, $id)
    {
        if (!Auth::check() || Auth::user()->perfil_id != 1) {
            return redirect('/dashboard')->with('error', 'Acesso negado.');
        }

        $request->validate([
            'password' => 'required|min:6|confirmed',
        ]);

        $user = User::findOrFail($id);
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->back()->with('success', "Senha do usuário {$user->name} alterada com sucesso!");
    }

    /**
     * Exclui um usuário.
     */
    public function gestaoExcluirUsuario($id)
    {
        if (!Auth::check() || Auth::user()->perfil_id != 1) {
            return redirect('/dashboard')->with('error', 'Acesso negado.');
        }

        $user = User::findOrFail($id);
        if ($user->id == Auth::id()) {
            return redirect()->back()->with('warning', 'Você não pode excluir a sua própria conta de administrador.');
        }

        $user->delete();

        return redirect()->back()->with('success', 'Usuário excluído com sucesso!');
    }
}
