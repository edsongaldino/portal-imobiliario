<?php

namespace App\Http\Controllers;

use App\Models\Anunciante;
use App\Models\Anuncio;
use App\Models\Leads;
use App\Models\RelatorioAnuncio;
use App\Mail\RelatorioSemanal;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class CronController extends Controller
{
    public function EnviarRelatorioSemanal()
    {
        ini_set('max_execution_time', 1200); // Allow enough time to process all advertisers

        $anunciantes = Anunciante::whereNull('deleted_at')
                                ->where('situacao_cadastro', 'Ativo')
                                ->whereNotNull('email')
                                ->get();

        $hoje = Carbon::now();
        $seteDiasAtras = Carbon::now()->subDays(7);

        $enviados = 0;

        foreach ($anunciantes as $anunciante) {
            try {
                // Total de imóveis ativos (Liberados)
                $imoveisAtivos = Anuncio::where('anunciante_id', $anunciante->id)
                                        ->where('situacao', 'Liberado')
                                        ->count();

                // Visualizações na semana (excluindo tipo = Lead)
                $visualizacoes = RelatorioAnuncio::join('anuncios', 'anuncios.id', '=', 'relatorio_anuncios.anuncio_id')
                                        ->where('anuncios.anunciante_id', $anunciante->id)
                                        ->where('relatorio_anuncios.tipo', '<>', 'Lead')
                                        ->whereBetween('relatorio_anuncios.created_at', [$seteDiasAtras, $hoje])
                                        ->count();

                // Leads na semana
                $leads = Leads::join('anuncios', 'anuncios.id', '=', 'leads.anuncio_id')
                                ->where('anuncios.anunciante_id', $anunciante->id)
                                ->whereBetween('leads.created_at', [$seteDiasAtras, $hoje])
                                ->whereNull('leads.deleted_at')
                                ->count();

                // Se não houver imóveis ativos, nem acessos, não envia o email para não gerar spam
                if ($imoveisAtivos == 0 && $visualizacoes == 0 && $leads == 0) {
                    continue; 
                }

                // Top 3 Imóveis mais acessados da semana
                $topImoveisIds = RelatorioAnuncio::join('anuncios', 'anuncios.id', '=', 'relatorio_anuncios.anuncio_id')
                                ->where('anuncios.anunciante_id', $anunciante->id)
                                ->where('relatorio_anuncios.tipo', '<>', 'Lead')
                                ->whereBetween('relatorio_anuncios.created_at', [$seteDiasAtras, $hoje])
                                ->select('relatorio_anuncios.anuncio_id', DB::raw('count(*) as acessos_semana'))
                                ->groupBy('relatorio_anuncios.anuncio_id')
                                ->orderBy('acessos_semana', 'desc')
                                ->take(3)
                                ->get();

                $topImoveis = collect();
                foreach ($topImoveisIds as $item) {
                    $imovel = Anuncio::with(['fotos', 'tipo', 'endereco.cidade.estado'])->find($item->anuncio_id);
                    if ($imovel) {
                        $imovel->acessos_semana = $item->acessos_semana;
                        $topImoveis->push($imovel);
                    }
                }

                // Prepare data for the view
                $dadosRelatorio = [
                    'data_inicio' => $seteDiasAtras->format('d/m/Y'),
                    'data_fim' => $hoje->format('d/m/Y'),
                    'imoveis_ativos' => $imoveisAtivos,
                    'visualizacoes' => $visualizacoes,
                    'leads' => $leads
                ];

                // Send email
                Mail::to(trim($anunciante->email))->send(new RelatorioSemanal($anunciante, $dadosRelatorio, $topImoveis));
                $enviados++;

            } catch (\Throwable $e) {
                Log::error("Erro ao enviar relatório semanal para o anunciante ID {$anunciante->id}: " . $e->getMessage());
            }
        }

        return response()->json([
            'status' => 'success',
            'message' => "Relatório semanal enviado para {$enviados} parceiros."
        ]);
    }

    public function EnviarRelatorioTeste($id)
    {
        $anunciante = Anunciante::findOrFail($id);
        
        $hoje = Carbon::now();
        $seteDiasAtras = Carbon::now()->subDays(7);

        // Total de imóveis ativos (Liberados)
        $imoveisAtivos = Anuncio::where('anunciante_id', $anunciante->id)
                                ->where('situacao', 'Liberado')
                                ->count();

        // Visualizações na semana (excluindo tipo = Lead)
        $visualizacoes = RelatorioAnuncio::join('anuncios', 'anuncios.id', '=', 'relatorio_anuncios.anuncio_id')
                                ->where('anuncios.anunciante_id', $anunciante->id)
                                ->where('relatorio_anuncios.tipo', '<>', 'Lead')
                                ->whereBetween('relatorio_anuncios.created_at', [$seteDiasAtras, $hoje])
                                ->count();

        // Leads na semana
        $leads = Leads::join('anuncios', 'anuncios.id', '=', 'leads.anuncio_id')
                        ->where('anuncios.anunciante_id', $anunciante->id)
                        ->whereBetween('leads.created_at', [$seteDiasAtras, $hoje])
                        ->whereNull('leads.deleted_at')
                        ->count();

        // Top 3 Imóveis mais acessados da semana
        $topImoveisIds = RelatorioAnuncio::join('anuncios', 'anuncios.id', '=', 'relatorio_anuncios.anuncio_id')
                        ->where('anuncios.anunciante_id', $anunciante->id)
                        ->where('relatorio_anuncios.tipo', '<>', 'Lead')
                        ->whereBetween('relatorio_anuncios.created_at', [$seteDiasAtras, $hoje])
                        ->select('relatorio_anuncios.anuncio_id', DB::raw('count(*) as acessos_semana'))
                        ->groupBy('relatorio_anuncios.anuncio_id')
                        ->orderBy('acessos_semana', 'desc')
                        ->take(3)
                        ->get();

        $topImoveis = collect();
        foreach ($topImoveisIds as $item) {
            $imovel = Anuncio::with(['fotos', 'tipo', 'endereco.cidade.estado'])->find($item->anuncio_id);
            if ($imovel) {
                $imovel->acessos_semana = $item->acessos_semana;
                $topImoveis->push($imovel);
            }
        }

        $dadosRelatorio = [
            'data_inicio' => $seteDiasAtras->format('d/m/Y'),
            'data_fim' => $hoje->format('d/m/Y'),
            'imoveis_ativos' => $imoveisAtivos,
            'visualizacoes' => $visualizacoes,
            'leads' => $leads
        ];

        try {
            Mail::to(trim($anunciante->email))->send(new RelatorioSemanal($anunciante, $dadosRelatorio, $topImoveis));
            return response()->json([
                'status' => 'success',
                'message' => "Relatório de teste enviado para o email {$anunciante->email} com sucesso!"
            ]);
        } catch (\Throwable $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Erro ao enviar email: ' . $e->getMessage()
            ]);
        }
    }
}
