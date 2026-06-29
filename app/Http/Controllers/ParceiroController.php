<?php

namespace App\Http\Controllers;

use App\Models\Anunciante;
use App\Models\AnuncianteIntegracao;
use App\Models\LogIntegracao;
use App\Models\LogIntegracaoAnuncio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ParceiroController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if (!Auth::check() || Auth::user()->perfil_id != 1) {
                return redirect('/dashboard')->with('error', 'Acesso permitido apenas para Administradores.');
            }
            return $next($request);
        });
    }

    /**
     * Lista todos os parceiros/anunciantes para gestão administrativa.
     */
    public function index(Request $request)
    {
        $query = Anunciante::withCount('anuncios')->with('endereco.cidade');

        // Busca rápida (topo ou avançada)
        if ($request->filled('busca')) {
            $busca = $request->busca;
            $query->where(function($q) use ($busca) {
                $q->where('nome', 'like', "%{$busca}%")
                  ->orWhere('razao_social', 'like', "%{$busca}%")
                  ->orWhere('cnpj', 'like', "%{$busca}%")
                  ->orWhere('creci', 'like', "%{$busca}%")
                  ->orWhere('email', 'like', "%{$busca}%");
            });
        }

        // Filtros Avançados
        if ($request->filled('cidade_id')) {
            $query->whereHas('endereco', function($q) use ($request) {
                $q->where('cidade_id', $request->cidade_id);
            });
        }

        if ($request->filled('tipo')) {
            $query->where('tipo_anunciante', $request->tipo);
        }

        if ($request->filled('situacao')) {
            $query->where('situacao_cadastro', $request->situacao);
        }

        if ($request->filled('creci')) {
            $query->where('creci', 'like', "%{$request->creci}%");
        }

        if ($request->filled('cnpj')) {
            $query->where('cnpj', 'like', "%{$request->cnpj}%");
        }

        if ($request->filled('imoveis_min')) {
            $query->has('anuncios', '>=', (int) $request->imoveis_min);
        }

        if ($request->filled('imoveis_max')) {
            $query->has('anuncios', '<=', (int) $request->imoveis_max);
        }

        if ($request->filled('data_cadastro')) {
            $query->whereDate('created_at', $request->data_cadastro);
        }

        $perPage = $request->input('per_page', 10);
        $parceiros = $query->orderBy('created_at', 'desc')->paginate($perPage);

        // Lista de Cidades para o select de filtros
        $cidades = \App\Models\Cidade::orderBy('nome_cidade', 'asc')->get();

        // Contagem de filtros ativos
        $filtrosAtivos = 0;
        $camposFiltros = ['cidade_id', 'tipo', 'situacao', 'imoveis_min', 'imoveis_max', 'data_cadastro', 'creci', 'cnpj', 'tag'];
        foreach ($camposFiltros as $campo) {
            if ($request->filled($campo)) $filtrosAtivos++;
        }

        return view('painel.parceiros.index', compact('parceiros', 'cidades', 'filtrosAtivos', 'request'));
    }

    /**
     * Exporta os parceiros para CSV/Excel.
     */
    public function exportarExcel(Request $request)
    {
        $query = Anunciante::withCount('anuncios')->with('endereco.cidade');

        if ($request->filled('busca')) {
            $busca = $request->busca;
            $query->where(function($q) use ($busca) {
                $q->where('nome', 'like', "%{$busca}%")
                  ->orWhere('razao_social', 'like', "%{$busca}%")
                  ->orWhere('cnpj', 'like', "%{$busca}%")
                  ->orWhere('creci', 'like', "%{$busca}%")
                  ->orWhere('email', 'like', "%{$busca}%");
            });
        }

        if ($request->filled('cidade_id')) {
            $query->whereHas('endereco', function($q) use ($request) {
                $q->where('cidade_id', $request->cidade_id);
            });
        }

        if ($request->filled('tipo')) {
            $query->where('tipo_anunciante', $request->tipo);
        }

        if ($request->filled('situacao')) {
            $query->where('situacao_cadastro', $request->situacao);
        }

        if ($request->filled('creci')) {
            $query->where('creci', 'like', "%{$request->creci}%");
        }

        if ($request->filled('cnpj')) {
            $query->where('cnpj', 'like', "%{$request->cnpj}%");
        }

        $parceiros = $query->orderBy('created_at', 'desc')->get();

        $filename = "parceiros_exportados_" . date('Y-m-d_H-i') . ".csv";

        $headers = [
            'Content-Type' => 'text/csv; charset=UTF-8',
            'Content-Disposition' => "attachment; filename=\"{$filename}\"",
            'Pragma' => 'no-cache',
            'Cache-Control' => 'must-revalidate, post-check=0, pre-check=0',
            'Expires' => '0'
        ];

        $callback = function() use ($parceiros) {
            $file = fopen('php://output', 'w');
            fprintf($file, chr(0xEF).chr(0xBB).chr(0xBF));
            fputcsv($file, ['ID', 'Nome / Razão Social', 'Tipo', 'E-mail', 'Telefone', 'Cidade/UF', 'CRECI', 'CNPJ', 'Total Imóveis', 'Situação Cadastro', 'Data Cadastro'], ';');

            foreach ($parceiros as $p) {
                fputcsv($file, [
                    $p->id,
                    $p->nome,
                    $p->tipo_anunciante ?? 'Imobiliária',
                    $p->email,
                    \App\Helpers\Helper::Phone($p->telefone_comercial),
                    ($p->endereco->cidade->nome_cidade ?? 'Cuiabá') . '-MT',
                    $p->creci ?? 'N/A',
                    $p->cnpj ?? 'N/A',
                    $p->anuncios_count,
                    $p->situacao_cadastro ?? 'Ativo',
                    $p->created_at ? $p->created_at->format('d/m/Y H:i') : ''
                ], ';');
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }

    /**
     * Altera a situação de cadastro do parceiro (Liberar acesso / Bloquear).
     */
    public function alterarStatus(Request $request, $id)
    {
        $request->validate([
            'situacao_cadastro' => 'required|in:Ativo,Aguardando,Bloqueado'
        ]);

        $parceiro = Anunciante::findOrFail($id);
        $parceiro->situacao_cadastro = $request->situacao_cadastro;
        $parceiro->save();

        $mensagem = match($request->situacao_cadastro) {
            'Ativo' => 'Acesso liberado com sucesso!',
            'Bloqueado' => 'Acesso bloqueado com sucesso!',
            default => 'Situação atualizada para Aguardando.'
        };

        return redirect()->back()->with('success', $mensagem);
    }

    /**
     * Exibe os detalhes da integração de um parceiro específico.
     */
    public function detalheIntegracao($id)
    {
        $parceiro = Anunciante::withCount('anuncios')->findOrFail($id);
        $integracoes = AnuncianteIntegracao::where('anunciante_id', $id)->get();
        $logIntegracao = LogIntegracao::where('anunciante_id', $id)->orderBy('created_at', 'desc')->first();
        
        $logAnuncios = null;
        if ($logIntegracao) {
            $logAnuncios = LogIntegracaoAnuncio::where('log_integracao_id', $logIntegracao->id)
                ->orderBy('created_at', 'desc')
                ->take(20)
                ->get();
        }

        return view('painel.parceiros.integracao', compact('parceiro', 'integracoes', 'logIntegracao', 'logAnuncios'));
    }
}
