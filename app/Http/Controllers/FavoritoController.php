<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Favorito;
use App\Models\HistoricoNavegacao;
use App\Models\Anuncio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavoritoController extends Controller
{
    /**
     * Display a listing of client's favorites and browsing history.
     */
    public function index()
    {
        if (!Auth::check()) {
            return redirect()->route('login.portal')->with('warning', 'Efetue login para ver seus favoritos.');
        }

        $usuario = Auth::user();

        // Get favorites
        $favorites = Favorito::where('user_id', $usuario->id)
            ->with(['anuncio.fotos', 'anuncio.endereco.cidade.estado', 'anuncio.tipo', 'anuncio.informacoes'])
            ->get();

        // Get browsing history
        $history = HistoricoNavegacao::where('user_id', $usuario->id)
            ->with(['anuncio.fotos', 'anuncio.endereco.cidade.estado', 'anuncio.tipo', 'anuncio.informacoes'])
            ->orderBy('updated_at', 'desc')
            ->take(12)
            ->get();

        return view('portal.favoritos', compact('usuario', 'favorites', 'history'));
    }

    /**
     * Toggle favorite status for an announcement.
     */
    public function toggle(Request $request)
    {
        if (!Auth::check()) {
            return response()->json([
                'status' => 'unauthorized',
                'message' => 'Você precisa estar logado para favoritar imóveis.'
            ], 401);
        }

        $request->validate([
            'anuncio_id' => 'required|exists:anuncios,id'
        ]);

        $userId = Auth::id();
        $anuncioId = $request->anuncio_id;

        $favorite = Favorito::where('user_id', $userId)
            ->where('anuncio_id', $anuncioId)
            ->first();

        if ($favorite) {
            $favorite->delete();
            return response()->json([
                'status' => 'success',
                'action' => 'removed',
                'message' => 'Imóvel removido dos favoritos.'
            ]);
        } else {
            Favorito::create([
                'user_id' => $userId,
                'anuncio_id' => $anuncioId
            ]);
            return response()->json([
                'status' => 'success',
                'action' => 'added',
                'message' => 'Imóvel adicionado aos favoritos!'
            ]);
        }
    }
}
