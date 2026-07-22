<?php

namespace App\Http\Controllers;

use App\Models\Indicativo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class IndicativoController extends Controller
{
    public function index()
    {
        if (Auth::user()->perfil_id != 1) {
            return redirect('/dashboard')->with('error', 'Acesso negado.');
        }

        $indicativos = Indicativo::orderBy('ano', 'desc')->orderBy('mes', 'desc')->get();
        return view('painel.indicativos.index', compact('indicativos'));
    }

    public function create()
    {
        if (Auth::user()->perfil_id != 1) {
            return redirect('/dashboard')->with('error', 'Acesso negado.');
        }

        return view('painel.indicativos.create');
    }

    public function store(Request $request)
    {
        if (Auth::user()->perfil_id != 1) {
            return redirect('/dashboard')->with('error', 'Acesso negado.');
        }

        $request->validate([
            'data_publicacao' => 'required|date',
            'mes' => 'required|string',
            'ano' => 'required|integer',
            'tipo' => 'required|string',
            'arquivo' => 'required|mimes:pdf|max:10240', // max 10MB
        ]);

        $indicativo = new Indicativo();
        $indicativo->data_publicacao = $request->data_publicacao;
        $indicativo->mes = $request->mes;
        $indicativo->ano = $request->ano;
        $indicativo->tipo = $request->tipo;

        if ($request->hasFile('arquivo')) {
            $file = $request->file('arquivo');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/indicativos'), $fileName);
            $indicativo->arquivo = 'uploads/indicativos/' . $fileName;
        }

        $indicativo->save();

        return redirect('/painel/indicativos')->with('success', 'Indicativo cadastrado com sucesso!');
    }

    public function destroy($id)
    {
        if (Auth::user()->perfil_id != 1) {
            return redirect('/dashboard')->with('error', 'Acesso negado.');
        }

        $indicativo = Indicativo::findOrFail($id);

        // Remove the file if it exists
        if (file_exists(public_path($indicativo->arquivo))) {
            unlink(public_path($indicativo->arquivo));
        }

        $indicativo->delete();

        return redirect('/painel/indicativos')->with('success', 'Indicativo excluído com sucesso!');
    }
}
