<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cidade extends Model
{
    use HasFactory;

    protected $table = 'cidades';

	public function estado()
    {
        return $this->hasOne(Estado::class, 'id', 'estado_id');
    }
}
