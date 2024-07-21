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
    public function index()
    {
        $leads = Leads::where('leads.deleted_at',null)
		->join('anuncios', 'anuncios.id', '=', 'leads.anuncio_id')
		->where('anuncios.anunciante_id',Auth::user()->anunciante->id)->paginate(10);
        return view('painel.leads.lista', compact('leads'));
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
