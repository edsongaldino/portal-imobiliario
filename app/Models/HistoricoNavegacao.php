<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoricoNavegacao extends Model
{
    use HasFactory;

    protected $table = 'historico_navegacao';

    protected $fillable = [
        'user_id',
        'anuncio_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function anuncio()
    {
        return $this->belongsTo(Anuncio::class);
    }
}
