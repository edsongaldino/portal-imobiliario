<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Models\Leads;
use App\Http\Controllers\Controller;
use App\Mail\EnviaLead;
use App\Mail\EnviaLeadParceiro;
use App\Models\Anuncio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use OpenApi\Annotations as OA;

/**
 * @OA\Info(
 *      version="1.0.0",
 *      title="Company - Service",
 *      description="Service documentation",
 *
 *      @OA\Contact(
 *          email="admin@admin.com"
 *      ),
 *
 *      @OA\License(
 *          name="Apache 2.0",
 *          url="https://www.apache.org/licenses/LICENSE-2.0.html"
 *      )
 * )
 */

class LeadsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = Leads::whereNull('leads.deleted_at')
            ->join('anuncios', 'anuncios.id', '=', 'leads.anuncio_id')
            ->with(['anuncio.endereco.cidade', 'anuncio.tipo', 'anuncio.anunciante'])
            ->select('leads.*');

        if (Auth::user()->perfil_id != 1) {
            $anuncianteId = Auth::user()->anunciante_id ?? (Auth::user()->anunciante->id ?? null);
            $query->where('anuncios.anunciante_id', $anuncianteId);
        }

        if ($request->filled('busca')) {
            $busca = $request->busca;
            $query->where(function($q) use ($busca) {
                $q->where('leads.nome', 'like', "%{$busca}%")
                  ->orWhere('leads.email', 'like', "%{$busca}%")
                  ->orWhere('leads.telefone', 'like', "%{$busca}%")
                  ->orWhere('leads.mensagem', 'like', "%{$busca}%")
                  ->orWhere('anuncios.titulo', 'like', "%{$busca}%")
                  ->orWhere('anuncios.id_externo', 'like', "%{$busca}%");
            });
        }

        if ($request->filled('tipo_imovel')) {
            $query->where('anuncios.tipo_id', $request->tipo_imovel);
        }

        if ($request->filled('cidade_id')) {
            $query->whereHas('anuncio.endereco', function($q) use ($request) {
                $q->where('cidade_id', $request->cidade_id);
            });
        }

        if ($request->filled('situacao')) {
            $query->where('leads.situacao', $request->situacao);
        }

        if ($request->filled('origem')) {
            $query->where('leads.origem', $request->origem);
        }

        if ($request->filled('data_inicio') && $request->filled('data_fim')) {
            $query->whereBetween('leads.created_at', [$request->data_inicio . ' 00:00:00', $request->data_fim . ' 23:59:59']);
        }

        $perPage = $request->input('per_page', 10);
        $leads = $query->orderBy('leads.created_at', 'desc')->paginate($perPage);

        $cidades = \App\Models\Cidade::orderBy('nome_cidade', 'asc')->get();
        $tipos = \App\Models\AnuncioTipo::orderBy('nome', 'asc')->get();

        $filtrosAtivos = 0;
        $campos = ['tipo_imovel', 'cidade_id', 'situacao', 'origem', 'data_inicio', 'data_fim', 'valor_min', 'valor_max'];
        foreach ($campos as $campo) {
            if ($request->filled($campo)) $filtrosAtivos++;
        }

        return view('painel.leads.lista', compact('leads', 'cidades', 'tipos', 'filtrosAtivos', 'request'));
    }

    /**
     * Exporta os leads filtrados para arquivo CSV compatível com Excel.
     */
    public function exportarExcel(Request $request)
    {
        $query = Leads::whereNull('leads.deleted_at')
            ->join('anuncios', 'anuncios.id', '=', 'leads.anuncio_id')
            ->with(['anuncio.endereco.cidade', 'anuncio.tipo', 'anuncio.anunciante'])
            ->select('leads.*');

        if (Auth::user()->perfil_id != 1) {
            $anuncianteId = Auth::user()->anunciante_id ?? (Auth::user()->anunciante->id ?? null);
            $query->where('anuncios.anunciante_id', $anuncianteId);
        }

        if ($request->filled('busca')) {
            $busca = $request->busca;
            $query->where(function($q) use ($busca) {
                $q->where('leads.nome', 'like', "%{$busca}%")
                  ->orWhere('leads.email', 'like', "%{$busca}%")
                  ->orWhere('leads.telefone', 'like', "%{$busca}%")
                  ->orWhere('leads.mensagem', 'like', "%{$busca}%")
                  ->orWhere('anuncios.titulo', 'like', "%{$busca}%")
                  ->orWhere('anuncios.id_externo', 'like', "%{$busca}%");
            });
        }

        if ($request->filled('tipo_imovel')) {
            $query->where('anuncios.tipo_id', $request->tipo_imovel);
        }

        if ($request->filled('cidade_id')) {
            $query->whereHas('anuncio.endereco', function($q) use ($request) {
                $q->where('cidade_id', $request->cidade_id);
            });
        }

        if ($request->filled('situacao')) {
            $query->where('leads.situacao', $request->situacao);
        }

        if ($request->filled('origem')) {
            $query->where('leads.origem', $request->origem);
        }

        if ($request->filled('data_inicio') && $request->filled('data_fim')) {
            $query->whereBetween('leads.created_at', [$request->data_inicio . ' 00:00:00', $request->data_fim . ' 23:59:59']);
        }

        $leads = $query->orderBy('leads.created_at', 'desc')->get();

        $filename = "leads_exportados_" . date('Y-m-d_H-i') . ".csv";

        $headers = [
            'Content-Type' => 'text/csv; charset=UTF-8',
            'Content-Disposition' => "attachment; filename=\"{$filename}\"",
            'Pragma' => 'no-cache',
            'Cache-Control' => 'must-revalidate, post-check=0, pre-check=0',
            'Expires' => '0'
        ];

        $callback = function() use ($leads) {
            $file = fopen('php://output', 'w');
            fprintf($file, chr(0xEF).chr(0xBB).chr(0xBF));
            fputcsv($file, ['ID', 'Nome', 'E-mail', 'Telefone', 'Imóvel / Interesse', 'Imobiliária / Anunciante', 'Origem', 'Situação', 'Mensagem', 'Data de Criação'], ';');

            foreach ($leads as $lead) {
                fputcsv($file, [
                    $lead->id,
                    $lead->nome,
                    $lead->email,
                    Helper::Phone($lead->telefone),
                    $lead->anuncio->titulo ?? 'N/A',
                    $lead->anuncio->anunciante->nome ?? 'N/A',
                    $lead->origem ?? 'Site',
                    $lead->situacao ?? 'Novo',
                    $lead->mensagem ?? '',
                    $lead->created_at ? $lead->created_at->format('d/m/Y H:i') : ''
                ], ';');
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $lead = new Leads();
        $lead->anuncio_id = $request->anuncio_id;
        $lead->nome = $request->nome;
        $lead->email = $request->email;
        $lead->telefone = Helper::limpa_campo($request->telefone);
        $lead->mensagem = $request->mensagem;

        $anuncio = Anuncio::find($request->anuncio_id);

        if($lead->save()){
            Mail::to($request->email)->send(new EnviaLead($lead));
            Mail::to($anuncio->anunciante->email)->send(new EnviaLeadParceiro($lead, $anuncio));
            $response_array['status'] = 'success';
            echo json_encode($response_array);
        }else{
            $response_array['status'] = 'error';
            echo json_encode($response_array);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Leads  $leads
     * @return \Illuminate\Http\Response
     */
    public function show(Leads $leads)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Leads  $leads
     * @return \Illuminate\Http\Response
     */
    public function edit(Leads $leads)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Leads  $leads
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Leads $leads)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Leads  $leads
     * @return \Illuminate\Http\Response
     */
    public function destroy(Leads $leads)
    {
        //
    }


    /**
    *  @OA\GET(
    *      path="/api/leads",
    *      summary="Get all leads",
    *      description="Get all leads",
    *      tags={"Leads"},
    *      @OA\Parameter(
    *         name="name",
    *         in="query",
    *         description="name",
    *         required=false,
    *      ),
    *     @OA\Parameter(
    *         name="email",
    *         in="query",
    *         description="email",
    *         required=false,
    *      ),
    *     @OA\Parameter(
    *         name="page",
    *         in="query",
    *         description="Page Number",
    *         required=false,
    *      ),
    *      @OA\Response(
    *          response=200,
    *          description="OK",
    *          @OA\MediaType(
    *              mediaType="application/json",
    *          )
    *      ),
    *
    *  )
    */
    public static function Getleads()
    {
        $leads = Leads::all();
        return response()->json([
            'status' => true,
            'leads' => $leads
        ]);
    }

}
