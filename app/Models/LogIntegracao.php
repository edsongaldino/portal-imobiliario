<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LogIntegracao extends Model
{
    use HasFactory;
    protected $table = 'log_integracoes';

    public function anunciante()
    {
        return $this->hasOne(Anunciante::class, 'id', 'anunciante_id');
    }
}
